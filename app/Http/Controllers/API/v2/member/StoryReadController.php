<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

class StoryReadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($storyId)
    {
        //
        $story = File::where('key', 'story')->findOrFail($storyId);
        $readers = $story->readers()->paginate();
        $readers_count = $story->readers()->count();
        return response()->json([
            'message' => 'success',
            'data' => $readers,
            'readers_count' => $readers_count,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $storyId)
    {
        //
        $story = File::where('key', 'story')->findOrFail($storyId);

        //input to read table with post_id and user_id just can read once
        $story->readers()->syncWithoutDetaching(auth()->user()->id);

        return response()->json([
            'message' => 'Berhasil read story',
            'data' => $story->loadCount('readers'),
        ], 200);
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
        $story = File::where('key', 'story')->findOrFail($id);
        $readers = $story->readers()->paginate();
        $readers_count = $story->readers()->count();
        return response()->json([
            'message' => 'success',
            'data' => $readers,
            'readers_count' => $readers_count,
        ], 200);
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
}
