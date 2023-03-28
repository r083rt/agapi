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

        $events = Event::with('author')
            ->has('author')
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
        //
        $userId = auth('api')->user()->id;

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            // location not required
            'category_id' => 'required',
            // 'price' not 'required',
            // 'image' not 'required',
        ]);

        $event = new Event;

        $event->user_id = $userId;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->type = $request->type;
        $event->start_at = $request->start_at;
        $event->end_at = $request->end_at;

        $event->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/events', 'wasabi');
            $event->image = $path;
        }

        if ($request->price) {
            $event->price = $request->price;
        }

        $event->save();

        return response()->json($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Event::with('location', 'user')->withCount('partisipants')->findOrFail($id);
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

    public function geteventbydate($month, $year)
    {
        $events = Event::with('author')
            ->has('author')
            ->withCount('partisipants')
            ->whereMonth('start_at', $month)
            ->whereYear('start_at', $year)
            ->orderBy('start_at', 'asc')
            ->paginate();

        return response()->json($events);
    }
}
