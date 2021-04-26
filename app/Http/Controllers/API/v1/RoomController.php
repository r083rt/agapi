<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Room::withCount('users')->with('users')->whereHas('users',function($query){
            $query->where('user_id',Auth::user()->id);
        })->orderBy('id','desc')->get();
        return response()->json($res);
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
        $room = new Room();
        $room->name = $request->name;
        $room->code = Str::random(5);
        $room->save();

        $res = $request->user()->rooms()->attach($room->id,['is_admin'=>true]);
        return response()->json($room->load('users')->loadCount('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
        return response()->json($room->load('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        return response()->json($room->delete());
    }

    public function join(Request $request){
        $room = Room::where('code',$request->code)->first();
        $res = $request->user()->rooms()->sync($room->id,false);
        return response()->json($room->load('users')->loadCount('users'));
    }
}
