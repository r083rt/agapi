<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Follow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $parent = $request->user();
        $child = User::findOrFail($request->child_id);
        $parent->follows()->sync($child,false);

        return response()->json($parent->load('follows')->loadCount('follows'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $parent = $request->user();
        $child = User::findOrFail($id);
        $parent->follows()->detach($child);
        return response()->json($parent->load('follows')->loadCount('follows'));
    }
}
