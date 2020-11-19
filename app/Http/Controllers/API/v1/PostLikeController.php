<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\LikedPostNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\PostLike;
use App\Models\Like;
use App\Models\Post;

class PostLikeController extends Controller
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
        $post = Post::findOrFail($request->post_id);
        if ($post->likes()->where('user_id',$request->user()->id)->doesntExist()) {
            $like = new Like(['user_id' => $request->user()->id]);
            $post->likes()->save($like);
            // $post->likes()->sync($like, false);
            $like->load('likeable','user');
            // \App\Models\User::find($post->author_id)->notify(new LikedPostNotification($like));
            if($like->likeable->author_id!==$like->user_id)\App\Events\LikedPostEvent::dispatch($like);
        }

        return response()->json($post->load('likes')->loadCount('likes', 'liked'));
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
        $post = Post::find($id);
        if($post->likes()->where('user_id', Auth::user()->id)->delete()){
             //remove notification
             \App\Models\Notification::whereHasMorph('notifiable', 'App\Models\User',function($query)use($post){
                $query->where('id','=',$post->author_id);  
              })
              ->where('type','App\Notifications\LikedPostNotification')
              ->where('data','REGEXP','"like_id":\s*'.abs($id))->delete();
        }
        return response()->json($post->load('likes')->loadCount('likes', 'liked'));
    }
}
