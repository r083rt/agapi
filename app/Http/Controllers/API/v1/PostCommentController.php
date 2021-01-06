<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\CommentedPostNotification;
use App\Models\Comment;
use App\Models\Post;
class PostCommentController extends Controller
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
        $comment = new Comment($request->all());
        $post = Post::findOrFail($request->post_id);
        $comment = $post->comments()->save($comment);
    
        $comment->load('commentable','user');
        
        //Orang2 yang telah mengomentari post ini akan menerima notifikasi komentar orang lain juga
        $users_comment = \App\Models\User::whereHas('comment',function($query)use($post){
            $query->where('comment_type','App\Models\Post')->where('comment_id',$post->id);
        })->where('id','!=',$post->author_id)->where('id','!=',$comment->user_id)->get();
        foreach($users_comment as $user){
            \App\Events\AlsoCommentedPostEvent::dispatch($user, $comment);
        }
        
        // \App\Models\User::find($post->author_id)->notify(new CommentedPostNotification($comment));
        //Orang yang membuat post akan menerima notifikasi komentar 
        if($comment->commentable->author_id!==$comment->user_id) {
            // $comment->loadMissing('commentable','user');
            \App\Events\CommentedPostEvent::dispatch($comment);
     
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
        //
    }
}
