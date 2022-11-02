<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class UserEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //

        $events = Event::where('user_id', $userId)
            ->where('deleted_at', null)
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
    public function store(Request $request)
    {
        //validasi data
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'start_at' => 'required|date',
            'address' => 'required|string|max:191',
        ]);



        //menambahkan data ke table event
        $event = new Event();
        $event->user_id = $request->user_id;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_at = $request->start_at;
        $event->end_at = $request->end_at;
        $event->address = $request->address;
        $event->link = $request->link;
        $event->type = $request->type;
        $event->save();

        //event menambahkan latitude dan longitude morph table  location
        $event->location()->create([
            'latitude' => $request->location['latitude'],
            'longitude' => $request->location['longitude'],
        ]);

        return response()->json($event->load('location'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId, $id)
    {
        //
        return Event::with('location')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId, $id)
    {
        //
        //validasi jika tipe event offline maka harus ada alamat dam lokasi
        if ($request->type == 'Offline') {
            $this->validate($request, [
                'name' => 'required|string|max:191',
                'start_at' => 'required|date',
                'address' => 'required|string|max:191',
                'location.latitude' => 'required',
                'location.longitude' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|string|max:191',
                'start_at' => 'required|date',
                'link' => 'required|url',
            ]);
        }

        $event = Event::findOrFail($id);
        $event->update($request->all());

        // jika request location tidak null dan jika lokasi ada maka update jika tidak ada maka buat baru
        if ($request->location != null) {
            if ($event->location != null) {
                $event->location->update([
                    'latitude' => $request->location['latitude'],
                    'longitude' => $request->location['longitude'],
                ]);
            } else {
                $event->location()->create([
                    'latitude' => $request->location['latitude'],
                    'longitude' => $request->location['longitude'],
                ]);
            }
        }

        return response()->json($event->load('location'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId, $id)
    {
        //
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json($event);
    }
}
