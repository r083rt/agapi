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
            ->paginate();;

    
        return response()->json($sessions);
    }
}
