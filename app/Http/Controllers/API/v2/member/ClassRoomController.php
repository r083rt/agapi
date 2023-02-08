<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);
        $rooms = $user->rooms()
            ->with(['users' => function ($query) {
                $query->limit(3);
            }])
            ->withCount('users')
            ->where('type', 'class')
            ->paginate();
        return response()->json($rooms);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function search($key)
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);
        $rooms = $user->rooms()
            ->with(['users' => function ($query) {
                $query->limit(3);
            }])
            ->withCount('users')
            ->where('type', 'class')
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();
        return response()->json($rooms);
    }
}
