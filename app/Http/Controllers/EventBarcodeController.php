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

    public function show()
    {
        return 'as';
    }

    public function update()
    {
    }

    public function destroy()
    {
    }

    public function download($eventId)
    {
        $event = Event::findOrFail($eventId);
        $url = env('APP_URL', 'localhost:8000');
        // $url = "http://192.168.1.13:8000";
        // return "$url/user/$userId/member-card";
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $event->name . '.jpg"');
        $file = Browsershot::url("$url/event/$eventId/barcode")
            ->noSandbox()
            ->windowSize(600, 600)
            ->fullPage()
            ->setNodeBinary(env('NODE_BINARY_PATH', '/usr/bin/node'))
            ->setNpmBinary(env('NPM_BINARY_PATH', '/usr/bin/npm'))
            ->save('php://output');
    }
}
