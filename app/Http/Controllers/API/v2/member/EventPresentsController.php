<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventPresentsController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'session_id' => 'required',
            'event_id' => 'required',
            'user_id' => 'required',
            'present_time' => 'required',
        ]);

        // Create a new EventPresents instance and fill it with the validated data
        $eventPresents = new EventPresents($validatedData);

        // Save the new EventPresents record to the database
        $eventPresents->save();

        // You can add a success message or redirect the user to a specific page here
    }

    public function showByEventAndUser($event_id, $user_id)
    {
        $eventPresents = EventPresents::where('event_id', $event_id)
            ->where('user_id', $user_id)
            ->get();

        // You can return the retrieved data to a view or as a JSON response
        return view('event_presents.show', compact('eventPresents'));
    }
}
