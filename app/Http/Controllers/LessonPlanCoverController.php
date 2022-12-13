<?php

namespace App\Http\Controllers;

use App\Models\LessonPlanCover;
use App\Models\User;
use Illuminate\Http\Request;

class LessonPlanCoverController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function coverlessonplan($creator_id, $topic, $grade, $cover_id){
        // return response()->json($request->all());
        $cover = LessonPlanCover::findOrFail($cover_id);
        $creator = User::findOrFail($creator_id);

        $data = [
            'image' => 'https://cdn-agpaiidigital.online' . "/$cover->image",
            'creator' => $creator->name,
            'topic' => $topic,
            'grade' => $grade
        ];

        return view('lessonplan.generatecover', compact('data'));
    }
}
