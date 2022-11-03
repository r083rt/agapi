<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class EventBarcodeController extends Controller
{
    //

    public function index($event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('barcode-event.barcode-event', compact('event'));
    }

    public function download($eventId)
    {
        $event = Event::findOrFail($eventId);
        $url = env('APP_URL', 'localhost:8000');
        // $url = "http://192.168.1.13:8000";
        // return "$url/user/$userId/member-card";
        $headers = array('Content-Type: image/png');


        $file = Browsershot::url("$url/event/$eventId/barcode")
            ->noSandbox()
            ->windowSize(600, 600)
            ->fullPage()
            ->setNodeBinary(env('NODE_BINARY_PATH', '/usr/bin/node'))
            ->setNpmBinary(env('NPM_BINARY_PATH', '/usr/bin/npm'));
        $base64 = $file->base64Screenshot();
        // download base64 as file without save to local storage
        $headers = array(
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="barcode.png"',
        );
        return response()->download($base64, 'barcode.png', $headers);
    }
}
