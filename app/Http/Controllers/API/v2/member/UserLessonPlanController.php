<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\LessonPlan;
use Illuminate\Http\Request;

class UserLessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //
        $lessonplans = LessonPlan::where('user_id', $userId)
            ->with([
                'grade',
                'likes',
                'user',
            ])->withCount(['likes'])
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($lessonplans);
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
        $lessonplan = new LessonPlan($request->all());
        $lessonplan->creator_id = $request->user()->id;
        $lessonplan->school = $request->user()->profile->school_place ?? 'Kosong';
        $lessonplan->effort = 100;
        $request->user()->lesson_plans()->save($lessonplan);

        if ($request->has('contents')) {
            $lessonplan->contents()->createMany($request->contents);
        }

        return response()->json($lessonplan);
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

    public function search($keyword)
    {
        $lessonplans = LessonPlan::where('user_id', auth('api')->user()->id)
            ->where('topic', 'like', "%$keyword%")
            ->with([
                'grade',
                'likes',
                'user',
            ])->withCount(['likes'])
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($lessonplans);
    }
}
