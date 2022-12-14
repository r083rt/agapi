<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\LessonPlan;
use Illuminate\Http\Request;

class LessonPlanLikedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lessonplans = LessonPlan::with([
            'grade',
            'likes',
            'user',
        ])
            ->withCount(['likes'])
            ->whereHas('likes', function ($query) {
                $query->where('user_id', auth('api')->user()->id);
            })
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

        $liked = LessonPlan::findOrfail($request->lessonPlanId)->likes()->create([
            'user_id' => auth('api')->user()->id,
        ]);
        if ($liked) {
            $lessonplan = LessonPlan::with([
                'grade',
                'likes',
                'user',
                'liked'
            ])->withCount(['likes'])->findOrFail($request->lessonPlanId);
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
    public function destroy(Request $request)
    {
        //
        $liked = LessonPlan::findOrfail($request->lessonPlanId)->likes()->where('user_id', auth('api')->user()->id)->delete();

        if ($liked) {
            $lessonplan = LessonPlan::with([
                'grade',
                'likes',
                'user',
                'liked'
            ])->withCount(['likes'])->findOrFail($request->lessonPlanId);
        }

        return response()->json($lessonplan);
    }

    public function search($keyword)
    {
        $lessonplans = LessonPlan::with([
            'grade',
            'likes',
            'user',
        ])
            ->where('topic', 'like', "%$keyword%")
            ->withCount(['likes'])
            ->whereHas('likes', function ($query) {
                $query->where('user_id', auth('api')->user()->id);
            })
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($lessonplans);
    }
}
