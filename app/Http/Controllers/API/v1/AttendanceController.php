<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id',
            function ($validator) {
                $validator->after(function ($validator) {
                    $event = Event::findOrFail($validator->getFormValue('event_id'));
                    if ($event->users()->where('id', $validator->getFormValue('user_id'))->count() > 0) {
                        $validator->errors()->add('user_id', 'User is already partisipant of this event');
                    }
                });
            },
            function ($validator) {
                $event = Event::findOrFail($validator->getFormValue('event_id'));
                // cek jika user belum melakukan pembayaran di attribute is_paid di event
                if ($event->price && !$event->is_paid) {
                    $validator->errors()->add('event_id', 'Event is not paid yet');
                }
            },
        ]);

        $event = Event::findOrFail($request->event_id);
        // $event_guest = new EventGuest(['user_id'=>$request->user_id]);
        $event->users()->sync($request->user_id, false);
        return response()->json($event->load('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
