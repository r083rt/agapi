<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Ad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }

    public function getactive()
    {
        $res = Ad::with(['post' => function ($query) {
            $query->with([
                'files',
                'bookmarks',
                'bookmarked',
                'authorId.role',
                'authorId.profile',
                'comments' => function ($query) {
                    $query
                        ->with('likes.user', 'liked')
                        ->withCount('likes', 'liked')
                        ->orderBy('created_at', 'asc');
                },
                'comments.user',
                'likes.user',
            ])->withCount('comments', 'likes', 'liked');
        }])->where('is_active', true)->get();
        return response()->json($res);
    }
}
