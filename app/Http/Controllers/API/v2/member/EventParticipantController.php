<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\EventGuest;
use Illuminate\Http\Request;

class EventParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($event_id)
    {
        //
        $participants = EventGuest::where('event_id', $event_id)
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($participants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'event_id' => 'required',
            'user_id' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $eventGuest = EventGuest::where('event_id', $request->event_id)
                        ->where('user_id', $value)
                        ->first();

                    if ($eventGuest) {
                        return $fail('Anda sudah absen pada event ini');
                    }
                }
            ],
        ]);

        $event_participant = new EventGuest($request->all());
        $event_participant->save();

        return response()->json($event_participant);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($eventId, $userId)
    {
        //
        $event_participant = EventGuest::where('event_id', $eventId)
            ->where('user_id', $userId)
            ->first();

        return response()->json($event_participant->load('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search($event_id, $keyword)
    {
        //mencari participant berdasarkan keyword di event tertentu
        $participants = EventGuest::where('event_id', $event_id)
            ->whereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($participants);
    }
}
