<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\LessonPlan;
use App\Models\Like;

class LessonPlanLikeController extends Controller
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
        if ($lessonplan->likes()->where('user_id',$request->user()->id)->doesntExist()) {
            $like = new Like(['user_id' => $request->user()->id]);
            $lessonplan->likes()->save($like);
            //$lessonplan->likes()->sync($like, false);
            if($like->likeable->user_id!==$like->user_id){
                $like->load('likeable.grade','likeable.contents','likeable.user','user');
                \App\Events\LikedLessonPlanEvent::dispatch($like);
            }
        }

        return response()->json($lessonplan->load('likes')->loadCount('likes', 'liked'));
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
        if($lessonplan->likes()->where('user_id', Auth::user()->id)->delete()){
              //remove notification
              \App\Models\Notification::whereHasMorph('notifiable', 'App\Models\User',function($query)use($lessonplan){
                $query->where('id','=',$lessonplan->user->id);  
              })
              ->where('type','App\Notifications\LikedLessonPlanNotification')
              ->where('data','REGEXP','"like_id":\s*'.abs($id))->delete();
        }
        return response()->json($lessonplan->load('likes')->loadCount('likes', 'liked'));
    }
}
