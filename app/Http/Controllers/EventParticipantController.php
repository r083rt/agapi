<?php

namespace App\Http\Controllers;

use App\Models\EventGuest;
use Illuminate\Http\Request;
use App\Models\User;

class EventParticipantController extends Controller
{
    //

    public function index($userId)
    {
        $user = User::findOrFail($userId);
        $storageUrl = env('STORAGE_URL', env('APP_URL', 'localhost:8000'));

        return view('event-participant.event-participant-card', compact('user', 'storageUrl'));
    }

    public function show($eventId, $userId)
    {
        $event = EventGuest::where('event_id', $eventId)
            ->where('user_id', $userId)
            ->with('user', 'event')
            ->first();
        $storageUrl = env('STORAGE_URL', env('APP_URL', 'localhost:8000'));

        return view('event-participant.event-participant-card', compact('event', 'storageUrl'));
    }
}
