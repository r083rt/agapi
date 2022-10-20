<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Member\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Thumbnail;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stories = User::with(['stories' => function ($query) {
            $query->with('thumbnail')->where('type', '!=', null)->whereDate('created_at', date('Y-m-d'))
                ->orderBy('created_at', 'desc');
        }])
            ->whereHas('stories', function ($query) {
                $query->where('type', '!=', null)->whereDate('created_at', date('Y-m-d'));
            })
            ->select(
                DB::raw('id, name, avatar'),
                DB::raw('(SELECT created_at FROM files WHERE file_id = users.id AND file_type = "App\\\Models\\\Member\\\User" ORDER BY created_at DESC LIMIT 1) as last_story'),
            )
            ->orderBy('last_story', 'desc')
            ->paginate();
        return response()->json($stories);
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
        return response()->json($request->all());
        // $request->validate([
        //     // bisa gambar dan video
        //     'file' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,ogg,qt',
        // ]);
        // return response()->json('test');
        // return response()->json([
        //     'message' => 'ok',
        //     'type' => $request->file('file')->getMimeType(),
        //     'type2' => $request->file('file')->getClientMimeType(),
        //     'type3' => $request->file('file')->extension(),
        //     'type4' => $request->file('file')->getType(),
        // ]);
        $mimeType = $request->file('file')->getClientMimeType();
        // jika gambar
        if (strpos($mimeType, 'image') !== false) {
            $file = new File();
            $file->key = 'story';
            $file->file_type = 'App\Models\Member\User';
            $file->file_id = $request->user()->id;

            $extension = $request->file('file')->extension();
            $fileName = time() . '.' . $extension;

            $file->type = 'image/' . $extension;
            $path = 'stories/' . $fileName;

            $compressed = \Image::make($request->file('file'))->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 60);
            Storage::disk(env('FILESYSTEM_DRIVER'))->put($path, $compressed);
            $file->src = $path;
            $file->save();

        }

        // jika video
        if (strpos($mimeType, 'video') !== false) {
            $file = new File();
            $file->key = 'story';
            $file->file_type = 'App\Models\Member\User';
            $file->file_id = $request->user()->id;

            $extension = $request->file('file')->extension();
            $fileName = time() . '.' . $extension;

            $file->type = 'video/' . $extension;
            $path = $request->file('file')->store('stories', env('FILESYSTEM_DRIVER', 'public'));
            $file->src = $path;
            $file->save();

            // file type is video
            // set storage path to store the file (image generated for a given video)
            $thumbnail_path = public_path() . '/storage/thumbnails';
//check if folder is exists
            if (!Storage::disk('public')->exists('thumbnails')) {
                Storage::disk('public')->makeDirectory('thumbnails', 0777, true); //creates directory
            }

            // set thumbnail image name
            $timestamp = time();
            $thumbnail_image = $request->user()->id . "." . $timestamp . ".jpg";
// get video length and process it
            // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
            // $time_to_image    = floor(($data['video_length'])/2);
            $time_to_image = 0.1;
            $thumbnail_status = Thumbnail::getThumbnail($request->file('file'), $thumbnail_path, $thumbnail_image, $time_to_image);
            $storagePublic = Storage::disk('wasabi')->put('thumbnails/' . $thumbnail_image, Storage::disk('public')->get('thumbnails/' . $thumbnail_image));
// dd($storagePublic);
            if ($storagePublic) {
                Storage::disk('public')->delete('thumbnails/' . $thumbnail_image);
            }

            $thumbnail = new File();

            $thumbnail->src = 'thumbnails/' . $thumbnail_image;
            $thumbnail->type = 'image/jpg';
            $thumbnail->file_id = $file->id;
            $thumbnail->file_type = 'App\Models\File';
            $thumbnail->key = 'thumbnail';
            $thumbnail->save();

        }

        return response()->json($file);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
