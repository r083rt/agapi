<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\LikedCommentNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Like;

class CommentLikeController extends Controller
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
        $comment = Comment::findOrFail($request->comment_id);
        if ($comment->likes()->where('user_id', $request->user()->id)->doesntExist()) {
            $like = new Like(['user_id' => $request->user()->id]);
            $comment->likes()->save($like);
            // $comment->likes()->sync($like, false);
            // \App\Models\User::find($comment->user_id)->notify(new LikedCommentNotification($like));
            $like->load('likeable','user');
            \App\Events\LikedCommentEvent::dispatch($like);


        }

        return response()->json($comment->load('likes', 'user')->loadCount('likes', 'liked'));
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

       
        $comment = Comment::with('user')->findOrFail($id);
    
        if($comment->likes()->where('user_id', Auth::user()->id)->delete()){
            //remove notification
            \App\Models\Notification::whereHasMorph('notifiable', 'App\Models\User',function($query)use($comment){
                $query->where('id','=',$comment->user->id);  
              })
              ->where('type','App\Notifications\LikedCommentNotification')
              ->where('data','REGEXP','"like_id":\s*'.abs($id))->delete();
        }
       
        return response()->json($comment->load('likes', 'user')->loadCount('likes', 'liked'));
    }
}
