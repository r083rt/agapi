<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostReadController extends Controller
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
        // post readers paginate
        $readers = $post->readers()->paginate();
        return response()->json($readers);
        // return response()->json($post->readers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi jika user sudah pernah membaca post ini maka tidak bisa membaca lagi
        $request->validate([
            'postId' => 'required|exists:posts,id',
            'userId' => 'required|exists:users,id',
        ]);

        //
        $post = Post::findOrFail($request->postId);

        //input to read table with post_id and user_id just can read once
        $post->readers()->syncWithoutDetaching(auth()->user()->id);

        return response()->json([
            'message' => 'Berhasil read post',
            'data' => $post,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
