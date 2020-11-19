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
        // \App\Models\User::find($post->author_id)->notify(new CommentedPostNotification($comment));
        if($comment->commentable->author_id!==$comment->user_id) \App\Events\CommentedPostEvent::dispatch($comment);

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
