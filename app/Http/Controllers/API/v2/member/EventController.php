<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\Profile; 
use App\Models\EventCategory;
use App\Models\EventSession;
use App\Models\EventPresents;
use App\Models\EventGuest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = Event::with('author','category', 'province','city','session_detail')
            ->has('author')
            ->withCount('partisipants')
            ->orderBy('id', 'desc')
            ->paginate();

       


        return response()->json($events);
    }

       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function geteventcategory()
    {
        $eventCategories = EventCategory::all();
    
        return response()->json($eventCategories);
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

        $event->user_id = $userId;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->type = $request->type;
        $event->start_at = $request->start_at;
        $event->end_at = $request->end_at;
        $event->address = $request->address;
        $event->facilities = $request->facilities;
        $event->category_id = $request->category_id;
       
        $event->session = $request->session;


        if ($request->hasFile('image')) {
            
            $path = $request->file('image')->store('public/events', 'wasabi');
            $event->image = $path;
        }

        if($request->province_id){
            $event->province_id = $request->province_id;
            $event->city_id = $request->city_id;
        }

        if ($request->price) {
            $event->price = $request->price;
        }

        $event->save();

        // Handle the array of sessions and associate them with the event
        if ($request->has('sessions')) {
            $sessions = $request->sessions;

            foreach ($sessions as $sessionData) {
                $eventSession = new EventSession;
                $eventSession->event_id = $event->id; // Associate with the current event
                $eventSession->session_no = $sessionData['id'];
                $eventSession->session_name = $sessionData['name'];
                $eventSession->session_time = $sessionData['waktu'];
                $eventSession->save();
            }
        }

        return response()->json($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Event::with('location', 'user')->withCount('partisipants')->findOrFail($id);
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

    public function getCreatedEvents($userId)
    {

        $events = Event::with('author','category', 'province','city','partisipants','session_detail')
            ->where('user_id', $userId)
            ->has('author')
            ->withCount('partisipants')
            ->orderBy('id', 'desc')
            ->paginate();

       
        return response()->json($events);
    }

    public function geteventbydate($month, $year)
    {
        $events = Event::with('author')
            ->has('author')
            ->withCount('partisipants')
            ->whereMonth('start_at', $month)
            ->whereYear('start_at', $year)
            ->orderBy('start_at', 'asc')
            ->paginate();

        return response()->json($events);
      
    }



    public function showSession($id, $user_id)
    {
        // Retrieve EventSession data with presents relationship
        $sessions = EventSession::with(['presents' => function ($query) use ($user_id) {
            // Add a constraint to filter the 'presents' relationship by 'user_id'
            $query->where('user_id', $user_id);
        }])
        ->where('event_id', $id)
        // ->orderBy('id', 'desc')
        ->get();

        return response()->json($sessions);
    }


    public function addPresents($eventId, $sessionId, $ktaId)
    {
       
        return DB::transaction(function () use ($eventId, $sessionId, $ktaId) {
            $user = User::where('kta_id', $ktaId)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found.']);
            }

            $userId = $user->id;

            // Find the event by its ID
            $event = Event::findOrFail($eventId);

           
            $session = EventSession::findOrFail($sessionId);

           
            if (EventPresents::where('event_id', $eventId)
                            ->where('session_id', $sessionId)
                            ->where('user_id', $userId)
                            ->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda sudah absen untuk sesi ini.',
                ]);
            }

            $presentTime = Carbon::now();

            $present = new EventPresents([
                'event_id' => $eventId,
                'session_id' => $sessionId,
                'user_id' => $userId,
                'present_time' => $presentTime,
            ]);

            $present->save();

           
            if (!EventGuest::where('event_id', $eventId)
                        ->where('user_id', $userId)
                        ->exists()) {
                // If not, create a new EventGuest record
                $eventGuest = new EventGuest([
                    'event_id' => $eventId,
                    'user_id' => $userId,
                ]);

                $eventGuest->save();
            }

            return response()->json([
                'success' => true,
                'message' => 'Absen berhasil.',
            ]);
        }, 5); 
    }
   
}
