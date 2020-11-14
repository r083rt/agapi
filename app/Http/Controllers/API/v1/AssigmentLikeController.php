<?php

namespace App\Http\Controllers\API\v1;

use App\Models\AssigmentLike;
use App\Models\Like;
use App\Models\Assigment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssigmentLikeController extends Controller
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
        
        $assigment = Assigment::findOrFail($request->assigment_id);
        if ($assigment->likes()->where('user_id',$request->user()->id)->doesntExist()) {
            $like = new Like(['user_id' => $request->user()->id]);
            $assigment->likes()->save($like);
            //$assigment->likes()->sync($like, false);
        }

        return response()->json($assigment->load('likes')->loadCount('likes', 'liked'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssigmentLike  $assigmentLike
     * @return \Illuminate\Http\Response
     */
    public function show(AssigmentLike $assigmentLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssigmentLike  $assigmentLike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssigmentLike $assigmentLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssigmentLike  $assigmentLike
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $assigment = Assigment::findOrFail($id);
        $assigment->likes()->where('user_id', Auth::user()->id)->delete();
        return response()->json($assigment->load('likes')->loadCount('likes', 'liked'));
    }
}
