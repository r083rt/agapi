<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Rating;
use App\Models\LessonPlan;

class LessonPlanRatingController extends Controller
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
        $lessonplan = LessonPlan::findOrFail($request->post_id);
        $lessonplan->ratings()->where('user_id',$request->user()->id)->delete();
        $rating = new Rating(['user_id' => $request->user()->id, 'value'=>$request->value]);
        $lessonplan->ratings()->save($rating);
        $lessonplan->ratings()->sync($rating,false);

        return response()->json($lessonplan->load('ratings')->loadCount([
            'ratings as ratings_value_count'=>function($query){
                $query->select(DB::raw('SUM(value)'));
        },
            'rated as rated_value_count'=>function($query){
                $query->select(DB::raw('SUM(value)'));
        }
        ]));
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
        $lessonplan = LessonPlan::find($id);
        $lessonplan->ratings()->where('user_id', Auth::user()->id)->delete();
        return response()->json($lessonplan->load('ratings')->loadCount('ratings', 'rated'));
    }
}
