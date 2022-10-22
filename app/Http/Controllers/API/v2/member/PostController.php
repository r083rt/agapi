<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $posts = Post::with([
            'images', 'videos',
            'author.profile',
            'author.role',
        ])
            ->withCount(['comments', 'likes', 'comments as last_comment' => function ($query) {
                $query->with('user')->orderBy('created_at', 'desc')->limit(1);
            }, 'likes as last_like' => function ($query) {
                $query->with('user')->orderBy('created_at', 'desc')->limit(1);
            }])
            ->whereHas('author', function ($query) {
                $query->where('role_id', '!=', 8);
            })
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
        // return response()->json([$request->all(), $request->hasFile('images'), $request->file('images')[0]->getClientOriginalName()]);
        $post = new Post($request->all());

        \DB::transaction(function () use ($request, $post) {

            $post->slug = Str::random(8);
            $request->user()->posts()->save($post);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $image = new File();
                    $fileName = time() . '.' . $request->file('images')[$index]->extension();

                    $compressedImage = \Image::make($request->file('images')[$index])->resize(1080, null, function ($constraint) {
                        $constraint->aspectRatio("1:1");
                    })->encode('jpg', 60);

                    $folderPath = "images";
                    $path = "{$folderPath}/{$fileName}";

                    // simpan gambar
                    Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $compressedImage);

                    $image->src = $path;
                    $image->type = $request->file('images')[$index]->getClientMimeType();
                    $post->images()->save($image);
                }
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
    public function show($id)
    {
        //
        $post = Post::with([
            'images',
            'bookmarked',
            'authorId.role',
            'authorId.profile',
            'comments' => function ($query) {
                $query
                    ->with('likes.user', 'liked', 'author.profile', 'author.role')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'asc');
            },
            'likes.user',
        ])->withCount('comments', 'likes', 'liked')->find($id);

        return response()->json($post);

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
    public function destroy($postId)
    {
        //
        $user = User::findOrFail(auth()->user()->id);
        $delete = $user->posts()->findOrFail($postId)->delete();
        return response()->json([
            'message' => 'Post deleted',
            'deleted' => $delete,
        ]);
    }
}
