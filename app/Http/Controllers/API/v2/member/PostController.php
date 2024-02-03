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

    public function userPost($user_id)
    {
        $posts = Post::with([
            'images', 'videos',
            'media.thumbnail',
            'author.profile',
            'author.role',
            'last_like.user',
            'last_comment.user',
        ])
            ->withCount(['comments', 'likes'])
            ->whereHas('author', function ($query) use ($user_id) {
                $query->where('role_id', '!=', 8)->where('id', $user_id);
            })
            // ->where('key', '!=', 'ad')
            ->orderBy('created_at', 'desc')
            ->paginate();

        return response()->json($posts);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'body' => 'required',
        ]);
    
        $post = Post::findOrFail($id);
        $post->fill($request->all());
        // $user = User::findOrFail(auth()->user()->id);
    
      
        // if ($post->user_id !== $user->id) {
        //     return response()->json(['error' => 'Unauthorized'], 403);
        // }
    
        // // Update post attributes
        // $post->body = 'TESSSSSSSSSSSSSSSSSSSS';
        $post->save();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                if (strpos($request->allFiles()['files'][$index]->getClientMimeType(), 'image') !== false) {
                    $image = new File();
                    $fileName = $user->id . '-' . $index . '-' . time() . '.' . $request->file('files')[$index]->extension();

                    $compressedImage = \Image::make($request->file('files')[$index])
                        // ->resize(1080, null, function ($constraint) {
                        //     $constraint->aspectRatio("1:1");
                        // })
                        ->encode('jpg', 60);

                    $folderPath = "images";
                    $path = "{$folderPath}/{$fileName}";

                    // simpan gambar
                    Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $compressedImage);

                    $image->src = $path;
                    $image->type = $request->file('files')[$index]->getClientMimeType();
                    $post->images()->save($image);
                }
                if (strpos($request->allFiles()['files'][$index]->getClientMimeType(), 'video') !== false) {
                    $file = new File();
                    $path = $request->allFiles()['files'][$index]->store('videos', 'wasabi');

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
                    $thumbnail_status = Thumbnail::getThumbnail($request->allFiles()['files'][$index], $thumbnail_path, $thumbnail_image, $time_to_image);
                    $storagePublic = Storage::disk('wasabi')->put('thumbnails/' . $thumbnail_image, Storage::disk('public')->get('thumbnails/' . $thumbnail_image));
                    // dd($storagePublic);
                    if ($storagePublic) {
                        Storage::disk('public')->delete('thumbnails/' . $thumbnail_image);
                    }
                    $file->src = $path;
                    $file->type = $request->allFiles()['files'][$index]->getClientMimeType();
                    $file->value = 'thumbnails/' . $thumbnail_image;
                    $post->files()->save($file);
                }
            }
        }

        return response()->json($post->load([
            'images', 'videos',
            'media.thumbnail',
            'author.profile',
            'author.role',
            'last_like.user',
            'last_comment.user',
        ])->loadCount(['comments', 'likes']));



        // $res["message"] = "success";
        // $res["result"] = $post;
        // return response()->json($res);
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

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $path = $request->$file->store('public/posts', 'wasabi');
                // if (strpos($request->allFiles()['files'][$index]->getClientMimeType(), 'image') !== false) {
                //     $image = new File();
                //     $fileName = $user->id . '-' . $index . '-' . time() . '.' . $request->file('files')[$index]->extension();

                //     $compressedImage = \Image::make($request->file('files')[$index])
                //         // ->resize(1080, null, function ($constraint) {
                //         //     $constraint->aspectRatio("1:1");
                //         // })
                //         ->encode('jpg', 60);

                //     $folderPath = "images";
                //     $path = "{$folderPath}/{$fileName}";

                //     // simpan gambar
                //     Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $compressedImage);

                //     $image->src = $path;
                //     $image->type = $request->file('files')[$index]->getClientMimeType();
                //     $post->images()->save($image);
                // }
                // if (strpos($request->allFiles()['files'][$index]->getClientMimeType(), 'video') !== false) {
                //     $file = new File();
                //     $path = $request->allFiles()['files'][$index]->store('videos', 'wasabi');

                //     // file type is video
                //     // set storage path to store the file (image generated for a given video)
                //     $thumbnail_path = public_path() . '/storage/thumbnails';
                //     //check if folder is exists
                //     if (!Storage::disk('public')->exists('thumbnails')) {
                //         Storage::disk('public')->makeDirectory('thumbnails', 0777, true); //creates directory
                //     }
                //     //------
                //     // set thumbnail image name
                //     $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                //     $thumbnail_image = $request->user()->id . "." . $timestamp . ".jpg";
                //     // get video length and process it
                //     // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
                //     // $time_to_image    = floor(($data['video_length'])/2);
                //     $time_to_image = 0.1;
                //     $thumbnail_status = Thumbnail::getThumbnail($request->allFiles()['files'][$index], $thumbnail_path, $thumbnail_image, $time_to_image);
                //     $storagePublic = Storage::disk('wasabi')->put('thumbnails/' . $thumbnail_image, Storage::disk('public')->get('thumbnails/' . $thumbnail_image));
                //     // dd($storagePublic);
                //     if ($storagePublic) {
                //         Storage::disk('public')->delete('thumbnails/' . $thumbnail_image);
                //     }
                //     $file->src = $path;
                //     $file->type = $request->allFiles()['files'][$index]->getClientMimeType();
                //     $file->value = 'thumbnails/' . $thumbnail_image;
                //     $post->files()->save($file);
                // }
            }
        }
    

        return response()->json($post->load([
            'images', 'videos',
            'media.thumbnail',
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
