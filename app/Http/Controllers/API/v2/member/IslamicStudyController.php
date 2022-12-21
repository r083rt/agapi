<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\IslamicStudy;
use Illuminate\Http\Request;

class IslamicStudyController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $islamic_study =  IslamicStudy::with(
            'category',
            'thumbnail',
            'content',
            'user',
            'liked',
            'comments.user'
        )
            ->withCount('likes')
            ->findOrFail($id);

        return response()->json($islamic_study);
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

    public function search($keyword)
    {
        $islamic_studies = IslamicStudy::with('category', 'thumbnail')
            ->where('title', 'like', "%$keyword%")
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($islamic_studies);
    }
}
