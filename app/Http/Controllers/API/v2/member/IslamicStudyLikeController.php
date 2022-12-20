<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\IslamicStudy;
use Illuminate\Http\Request;

class IslamicStudyLikeController extends Controller
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

        $islamic_study = IslamicStudy::findOrFail($request->islamicStudyId);

        $islamic_study->loadCount('liked');

        if ($islamic_study->liked_count == 0) {
            $like = new \App\Models\Like;
            $like->user_id = auth('api')->user()->id;
            $islamic_study->likes()->save($like);

            if ($like->likeable->user_id !== $like->user_id) {
                $like->load('likeable', 'user');
                \App\Events\LikedModuleEvent::dispatch($like);
            }
        }
        return response()->json($islamic_study->load('liked'));
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
    public function destroy(Request $request)
    {
        //
        $liked = IslamicStudy::findOrFail($request->islamicStudyId)->likes()->where('user_id', auth('api')->user()->id)->delete();

        return response()->json($liked);
    }
}
