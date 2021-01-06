<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Comment;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\CommentedModuleNotification;

class ModuleCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $module = Module::with('user')->findOrFail($id);
        $comments = Comment::withCount('likes','liked')->with('user')->whereHasMorph('commentable','App\Models\Module',function($query)use($module){
            $query->where('id','=',$module->id);
        })->paginate();

        
        return ['module'=>$module,'comments'=>$comments];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $module_id)
    {
        //return $request;
        //return $module_id;
        $comment = new Comment;
        $comment->value=$request->value;
        $comment->user_id=auth('api')->user()->id;
        //return $comment;
        $module = Module::findOrFail($module_id);
        $module->comments()->save($comment);


        // \App\Models\User::find($module->user_id)->notify(new CommentedModuleNotification($comment));
        if($comment->commentable->user_id!==$comment->user_id) {
            $comment->load('commentable','user');
            \App\Events\CommentedModuleEvent::dispatch($comment);
        }

        return response()->json($comment->load('likes', 'user')->loadCount('likes', 'liked'));
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
    public function destroy(Comment $comment)
    {
        //
    }
}
