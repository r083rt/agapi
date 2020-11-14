<?php

namespace App\Http\Controllers\API\v1;

use App\Models\LessonPlanGuidedUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class LessonPlanGuidedUserController extends Controller
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
        $parent->lesson_plan_guided_users()->sync($child,false);

        return response()->json($parent->load('lesson_plan_guided_users')->loadCount('lesson_plan_guided_users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LessonPlanGuidedUser  $lessonPlanGuidedUser
     * @return \Illuminate\Http\Response
     */
    public function show(LessonPlanGuidedUser $lessonPlanGuidedUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LessonPlanGuidedUser  $lessonPlanGuidedUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LessonPlanGuidedUser $lessonPlanGuidedUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LessonPlanGuidedUser  $lessonPlanGuidedUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $childId)
    {
        //
        $lessonPlanGuidedUser = LessonPlanGuidedUser::where('parent_id',$request->user()->id)->where('child_id',$childId)->delete();
        return response()->json($lessonPlanGuidedUser);
    }
}
