<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::with('users.profile', 'user.profile')->orderBy('start_at', 'desc')
            // ->whereDate('start_at',Carbon::today())
            ->paginate($request->show ?? 10);
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event;
        $event->fill($request->except('start_at'));
        $event->user_id = $request->user()->id;
        $event->start_at = date('Y-m-d h:i:s', strtotime($request->start_at));
        $event->save();

        $request->user()->guest_events()->sync($event, false);

        return response()->json($event->load('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::with('users', 'user')->findOrFail($id);
        return response()->json($event);
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
        $event = Event::findOrfail($id);
        $event->delete();
        return response()->json($event);
    }

    public function get_event_years()
    {
        // return 'asd';
        $res = DB::table('events')
            ->select(
                DB::raw('YEAR(events.start_at) year'),
            )
            ->orderBy('year', 'desc')
            ->groupBy('year')
            ->get();
        return $res;
    }
}
