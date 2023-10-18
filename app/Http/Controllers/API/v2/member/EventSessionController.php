<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventSession;

class EventSessionController extends Controller
{
    public function show($id)
    {
        $sessions = EventSession::where('event_id', $id)
            ->orderBy('id', 'desc')
            ->paginate();

        // Now, let's join the EventPresents model using the event_id and user_id
        $sessions->load(['eventPresents' => function ($query) {
            $query->where('event_id', $id);
            $query->where('user_id', auth()->user()->id); // Assuming you want to match the current user's ID
        }]);

        return response()->json($sessions);
    }
}
