<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $posts = Post::with('images', 'videos', 'author.profile', 'likes')
            ->where('key', 'ad');

        if ($request->filter) {
            $posts->where(function ($query) use ($request) {
                $query->whereHas('author', function ($query2) use ($request) {
                    $query2->where('name', 'like', "%$request->filter%");
                });
            })
                ->orWhere('body', 'like', "%$request->filter%");
        }

        $posts = $posts->paginate();
        return response()->json($posts);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Post::with('images', 'videos', 'author.profile', 'likes')->findOrFail($id);
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

    public function search($keyword)
    {
        $posts = Post::with('images', 'videos', 'author.profile', 'likes')
            ->where(function ($query) use ($keyword) {
                $query->whereHas('author', function ($query2) use ($keyword) {
                    $query2->where('name', 'like', "%$keyword%");
                });
            })
            ->orWhere('body', 'like', "%$keyword%")
            ->paginate();

        return response()->json($posts);
    }

}
