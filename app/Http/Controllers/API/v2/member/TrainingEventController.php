<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class TrainingEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::whereHas('category', function ($query) {
            $query->where('name', 'Pelatihan');
        });

        // if request query search
        if (request()->query('search')) {
            $events->where('name', 'like', '%' . request()->query('search') . '%');
        }

        $res = $events->paginate(request()->query('per_page'));

        return response()->json($res);
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

        if($request->price) {
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
