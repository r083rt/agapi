<?php

namespace App\Http\Controllers\API\v1;

use App\Models\AssigmentComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Assigment;
use App\Notifications\CommentedAssigmentNotification;

class AssigmentCommentController extends Controller
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
        $comment = new Comment($request->all());
        $assigment = Assigment::findOrFail($request->assigment_id);
        $assigment->comments()->save($comment);

        \App\Models\User::find($assigment->user_id)->notify(new CommentedAssigmentNotification($comment));

        return response()->json($comment->load('likes', 'user')->loadCount('likes', 'liked'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssigmentComment  $assigmentComment
     * @return \Illuminate\Http\Response
     */
    public function show(AssigmentComment $assigmentComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssigmentComment  $assigmentComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssigmentComment $assigmentComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssigmentComment  $assigmentComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssigmentComment $assigmentComment)
    {
        //
    }
}
