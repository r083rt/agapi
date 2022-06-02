<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::with('images', 'videos', 'audios', 'docs', 'meeting_rooms', 'author.profile')
            ->has('author')
        // ->has('images')
            ->orderBy('created_at', 'desc')
            ->paginate();
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
        $request->validate([
            'body' => "required",
        ]);
        $post = new Post($request->all());

        \DB::transaction(function () use ($request, $post) {

            $post->slug = Str::random(8);
            $request->user()->posts()->save($post);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $image = new File();
                    $path = $request->file('images')[$index]->store('images', env('FILESYSTEM_DRIVER'));
                    $image->src = $path;
                    $image->type = $request->file('images')[$index]->getClientMimeType();
                    $post->images()->save($image);
                }
            }

            if (isset($request->rooms)) {
                $post->meeting_rooms()->attach($request->rooms);
            }

            if (isset($request->event)) {
                $post->events()->attach($request->event);
            }
        });
        return response()->json($post->load(['images', 'author.profile']));

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
