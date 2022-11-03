<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventBarcodeController extends Controller
{
    //

    public function index($event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('barcode-event.barcode-event', compact('event'));
    }
}
