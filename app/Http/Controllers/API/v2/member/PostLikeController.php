<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postId)
    {
        //
        $post = Post::findOrFail($postId);
        // post likes paginate
        // $likes = $post->likes()->paginate();
        // likes with user paginate
        $likes = $post->likes()->with('user')->paginate();
        return response()->json($likes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($postId, Request $request)
    {
        $post = Post::findOrFail($postId);
        // user hanya bisa like post sekali saja
        // return response()->json($post->id);
        if ($post->likes()->where('user_id', auth('api')->user()->id)->count() > 0) {
            return response()->json([
                'message' => 'Anda sudah menyukai postingan ini',
            ], 200);
        }

        $like = new Like(['user_id' => $request->user()->id]);
        $post->likes()->save($like);
        // $post->likes()->sync($like, false);
        // \App\Models\User::find($post->author_id)->notify(new LikedPostNotification($like));
        if ($like->likeable->author_id !== $like->user_id) {
            $like->load('likeable', 'user');
            \App\Events\LikedPostEvent::dispatch($like);
        }

        return response()->json([
            'message' => 'Berhasil like post',
            'data' => $post,
        ], 200);
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
        $post = Post::findOrFail($id);
        $post->likes()->where('user_id', auth('api')->user()->id)->delete();
        return response()->json([
            'message' => 'Berhasil unlike post',
        ], 200);
    }
}
