<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\EventGuest;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;

class EventParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($event_id)
    {
        //
        $participants = EventGuest::where('event_id', $event_id)
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($participants);
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
        $request->validate([
            'event_id' => 'required',
            'user_id' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $eventGuest = EventGuest::where('event_id', $request->event_id)
                        ->where('user_id', $value)
                        ->first();

                    if ($eventGuest) {
                        return $fail('Anda sudah absen pada event ini');
                    }
                }
            ],
        ]);

        $event_participant = new EventGuest($request->all());
        $event_participant->save();

        return response()->json($event_participant->load('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($eventId, $userId)
    {
        //
        $event_participant = EventGuest::where('event_id', $eventId)
            ->where('user_id', $userId)
            ->first();

        return response()->json($event_participant->load('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search($event_id, $keyword)
    {
        //mencari participant berdasarkan keyword di event tertentu
        $participants = EventGuest::where('event_id', $event_id)
            ->whereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($participants);
    }

    public function generateCard($eventId, $userId)
    {
        $url = env('APP_URL', 'localhost:8000');

        $event_guest = EventGuest::where('event_id', $eventId)
            ->where('user_id', $userId)
            // ->with('certificate')
            // ->has('certificate')
            ->first();



        if ($event_guest->doesntHave('certificate')) {
            // Storage::disk('wasabi')->delete($path);
            $base64 = Browsershot::url("$url/event/$eventId/participant/$userId")
                ->noSandbox()
                ->windowSize(600, 600)
                ->fullPage()
                ->setNodeBinary(env('NODE_BINARY_PATH', '/usr/bin/node'))
                ->setNpmBinary(env('NPM_BINARY_PATH', '/usr/bin/npm'))
                ->setChromePath(env('CHROME_BINARY_PATH', '/usr/lib/node_modules/chromium'))
                ->base64Screenshot();

            $file = base64_decode($base64);
            $filename = 'certif_' . $eventId . '/' . $userId . '.png';
            $path = '/files/certificates/' . $filename;

            Storage::disk('wasabi')->put($path, $file);
            $event_guest->certificate()->create([
                'name' => $filename,
                'src' => $path,
            ]);
        }

        return response()->json([
            'data' => $event_guest->certificate->src,
            'message' => 'Kartu absen',
        ]);
    }
}
