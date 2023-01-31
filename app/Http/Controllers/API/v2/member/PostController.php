<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Thumbnail;
use Carbon\Carbon;

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
            'media.thumbnail',
            'author.profile',
            'author.role',
            'last_like.user',
            'last_comment.user',
        ])
            ->withCount(['comments', 'likes'])
            ->whereHas('author', function ($query) {
                $query->where('role_id', '!=', 8);
            })
            // ->where('key', '!=', 'ad')
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
        // return response()->json([$request->hasFile('images')]);
        $post = new Post($request->all());
        $user = User::findOrFail(auth()->user()->id);

        $post->slug = Str::random(8);
        $request->user()->posts()->save($post);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $image = new File();
                $fileName = $user->id . '-' . $index . '-' . time() . '.' . $request->file('images')[$index]->extension();

                $compressedImage = \Image::make($request->file('images')[$index])
                    // ->resize(1080, null, function ($constraint) {
                    //     $constraint->aspectRatio("1:1");
                    // })
                    ->encode('jpg', 60);

                $folderPath = "images";
                $path = "{$folderPath}/{$fileName}";

                // simpan gambar
                Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $compressedImage);

                $image->src = $path;
                $image->type = $request->file('images')[$index]->getClientMimeType();
                $post->images()->save($image);
            }
        }

        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $index => $video) {
                $file = new File();
                $path = $request->allFiles()['videos'][$f]->store('videos', 'wasabi');

                // file type is video
                // set storage path to store the file (image generated for a given video)
                $thumbnail_path = public_path() . '/storage/thumbnails';
                //check if folder is exists
                if (!Storage::disk('public')->exists('thumbnails')) {
                    Storage::disk('public')->makeDirectory('thumbnails', 0777, true); //creates directory
                }
                //------
                // set thumbnail image name
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                $thumbnail_image = $request->user()->id . "." . $timestamp . ".jpg";
                // get video length and process it
                // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
                // $time_to_image    = floor(($data['video_length'])/2);
                $time_to_image = 0.1;
                $thumbnail_status = Thumbnail::getThumbnail($request->allFiles()['videos'][$f], $thumbnail_path, $thumbnail_image, $time_to_image);
                $storagePublic = Storage::disk('wasabi')->put('thumbnails/' . $thumbnail_image, Storage::disk('public')->get('thumbnails/' . $thumbnail_image));
                // dd($storagePublic);
                if ($storagePublic) {
                    Storage::disk('public')->delete('thumbnails/' . $thumbnail_image);
                }
                $file->src = $path;
                $file->type = $request->allFiles()['videos'][$f]->getClientMimeType();
                $file->value = 'thumbnails/' . $thumbnail_image;
                $post->files()->save($file);
            }
        }

        return response()->json($post->load([
            'images', 'videos',
            'author.profile',
            'author.role',
            'last_like.user',
            'last_comment.user',
        ])->loadCount(['comments', 'likes']));
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
                    ->orderBy('created_at', 'desc');
            },
            'likes.user',
        ])->withCount('comments', 'likes', 'liked')->findOrFail($id);

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
