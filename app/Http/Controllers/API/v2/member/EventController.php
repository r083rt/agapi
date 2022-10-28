<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // data berisi object tanggal lalu tiap tanggal berisi array event
        $events = DB::table('events')
            ->join('users', 'events.user_id', '=', 'users.id')
            ->select(
                'events.id as event_id',
                'events.name as event_name',
                'events.description as event_description',
                'events.start_at as event_start_at',
                'events.end_at as event_end_at',
                'events.address as event_address',
                DB::raw('DATE_FORMAT(events.start_at, "%Y-%m-%d") as event_date'),
                'users.id as author_id',
                'users.name as author_name',
                'users.email as author_email',
                'users.avatar as author_avatar',
                'users.kta_id as author_kta_id',
            )
        // group berdasarkan event_date menjadi object tanggal yang berisi array event
            ->where('events.end_at', '>=', now())
            ->orderBy('event_end_at', 'desc')
        // yang hari ini atau mendatang
            ->get()
            ->groupBy(function ($item, $key) {
                // return response()->json($item->event_start_at);
                return \Carbon\Carbon::parse($item->event_date)->format('Y-m-d');
            });

        return response()->json($events);

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
