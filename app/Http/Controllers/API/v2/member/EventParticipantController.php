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

    public function addParticipant($userId, $eventId)
    {
        try {
            
            $guest = new EventGuest([
                'event_id' => $eventId,
                'user_id' => $userId,
            ]);
    
            $guest->save();
    
            return response()->json(['message' => 'Participant added successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to add participant: ' . $e->getMessage()], 500); // You can customize the response and status code
        }


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


    public function getParticipatedEvents($userId)
    {
        // Get the user's participated events
        $event_participant = EventGuest::with([
            'event.author',
            'event.category',
            'event.city',
            'event.province',
            'event.session_detail',
        ])
        ->where('user_id', $userId)
        ->orderBy('id', 'desc')
        ->paginate(10);

        // Transform the event data into the desired format
        $formattedData = $event_participant->map(function ($item) {
            return [
                'id' => $item->event->id,
                'event_id' => $item->event->event_id,
                'user_id' => $item->user_id,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'name' => null,
                'description' => null,
                'address' => null,
                'start_at' => null,
                'event' => $item->event, // Include all event details
            ];
        });

        $response = [
            'current_page' => $event_participant->currentPage(),
            'data' => $formattedData,
            'first_page_url' => $event_participant->url(1),
            'from' => $event_participant->firstItem(),
            'last_page' => $event_participant->lastPage(),
            'last_page_url' => $event_participant->url($event_participant->lastPage()),
            'links' => [
                [
                    'url' => null,
                    'label' => '&laquo; Previous',
                    'active' => false,
                ],
                [
                    'url' => $event_participant->nextPageUrl(),
                    'label' => 'Next &raquo;',
                    'active' => !is_null($event_participant->nextPageUrl()),
                ],
            ],
            'next_page_url' => $event_participant->nextPageUrl(),
            'path' => $event_participant->url($event_participant->currentPage()),
            'per_page' => $event_participant->perPage(),
            'prev_page_url' => $event_participant->previousPageUrl(),
            'to' => $event_participant->lastItem(),
            'total' => $event_participant->total(),
        ];

        return response()->json($response);
    }

    public function getEventParticipants($event_id)
    {
        //
        $participants = EventGuest::where('event_id', $event_id)
            ->with('user')
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($participants);
    }

    

    




}
