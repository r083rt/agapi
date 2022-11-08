<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class ProvinceEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinceId)
    {
        //
        $events = Event::with(['author'])
            ->whereHas('author.profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->withCount('partisipants')
            ->orderBy('id', 'desc')
            ->paginate();
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

    public function getprovinceeventbydate($provinceId, $month, $year)
    {
        $events = Event::with(['author'])
            ->whereHas('author.profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->whereMonth('start_at', $month)
            ->whereYear('start_at', $year)
            ->withCount('partisipants')
            ->orderBy('id', 'desc')
            ->paginate();
        return response()->json($events);
    }
}
