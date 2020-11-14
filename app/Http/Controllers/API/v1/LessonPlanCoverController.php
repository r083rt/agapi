<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LessonPlan;
use App\Models\LessonPlanCover;
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
        $lessonplancovers = LessonPlanCover::get();
        return response()->json($lessonplancovers);
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
        $lessonplancover = new LessonPlanCover($request->all());
        $lessonplancover->save();
        return response()->json($lessonplancover);
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
        $lessonplancover = LessonPlanCover::findOrFail($id);
        return response()->json($lessonplancover);
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
        $lessonplancover = LessonPlanCover::findOrFail($id);
        $lessonplancover->fill($request->all());
        $lessonplancover->update();
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
        $lessonplancover = LessonPlanCover::findOrFail($id);
        $lessonplancover->delete();
        return response()->json($lessonplancover);
    }
}
