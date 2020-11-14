<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $module = Module::with('user')->where('user_id','=',auth('api')->user()->id)->findOrFail($id);
        // $comments = Comment::withCount('likes','liked')->with('user')->whereHasMorph('commentable','App\Models\Module',function($query)use($module){
        //     $query->where('id','=',$module->id);
        // })->paginate();
        // return ['module'=>$module,'comments'=>$comments];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $moduleId)
    {
        $module=Module::where('user_id','=',auth('api')->user()->id)->findOrFail($moduleId);
        $module=$module->loadCount('liked');
        if($module->liked_count==0){
            $like= new \App\Models\Like;
            $like->user_id=auth('api')->user()->id;
            $module->likes()->save($like);
           
        }
        return $module->loadCount('liked','likes','comments');//->load('comments','user','template','module_contents','grade');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function dislike($moduleId){
        $module = Module::where('user_id','=',auth('api')->user()->id)->findOrFail($moduleId);
        $module->liked()->delete();
        return $module->loadCount('liked','likes','comments');

    }
    public function destroy($moduleId, $commentId)
    {
        \App\Models\Comment::where('user_id','=',auth('api')->user()->id)->where('comment_type','=','App\Models\Module')->where('comment_id','=',$moduleId)->findOrFail($commentId)->delete();

        return Module::with('liked','likes','comments')->where('user_id','=',auth('api')->user()->id)->findOrFail($moduleId);

    }
}
