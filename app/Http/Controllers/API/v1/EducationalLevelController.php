<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EducationalLevel;
use App\Models\LessonPlanFormat;

class EducationalLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationallevels = EducationalLevel::with('lesson_plan_formats','grades')->get();
        return response()->json($educationallevels);
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
        $educationallevel = EducationalLevel::with('lesson_plan_formats', 'grades')->find($id);
        return response()->json($educationallevel);
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
        $educationallevel = EducationalLevel::find($id);
        $educationallevel->fill($request->except('lesson_plan_formats', '_method'));
        $educationallevel->update();

        if (isset($request->lesson_plan_formats)) {
            $educationallevel->lesson_plan_formats()->delete();
            foreach ($request->lesson_plan_formats as $lpf => $lesson_plan_format) {
                # code...
                $lesson_plan_format = new LessonPlanFormat($lesson_plan_format);
                $educationallevel->lesson_plan_formats()->save($lesson_plan_format);
            }
        }

        return response()->json($educationallevel->load('lesson_plan_formats'));
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

    public function getByCity($cityId){
        $educationallevels = EducationalLevel::
        with(['users'=>function($query) use ($cityId){
            $query->where('city_id',$cityId)->where('role_id',2)->withCount('lesson_plans');
        }])
        ->whereHas('users.profile',function($query) use ($cityId){
            $query->where('city_id',$cityId)->where('role_id',2);
        })
        ->get();
        return response()->json($educationallevels);
    }
}
