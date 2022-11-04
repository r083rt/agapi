<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postId)
    {
        //
        $comments = Comment::with('author.profile')
            ->where('comment_type', 'App\Models\Post')
            ->where('comment_id', $postId)
            ->paginate();
        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        //
        $comment = new Comment();
        $comment->comment_type = 'App\Models\Post';
        $comment->comment_id = $postId;
        $comment->user_id = $request->user()->id;
        $comment->value = $request->comment;
        $comment->save();
        return response()->json($comment->load(['author.profile', 'author.role']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId, $commentId)
    {
        //
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return response()->json($comment);
    }
}
