<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Member\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            $query->whereDate('created_at', date('Y-m-d'))
                ->orderBy('created_at', 'desc');
        }])
            ->whereHas('stories', function ($query) {
                $query->whereDate('created_at', date('Y-m-d'));
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
        $request->validate([
            // bisa gambar dan video
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4',
        ]);

        $file = new File();
        $file->key = 'story';
        $file->file_type = 'App\Models\Member\User';
        $file->file_id = $request->user()->id;

        $extension = $request->file('file')->extension();
        $fileName = time() . '.' . $extension;

        // jika gambar
        if ($request->file('file')->isImage()) {
            $file->type = 'image/' . $extension;
            $path = 'stories/' . $fileName;

            $compressed = \Image::make($request->file('file'))->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 60);
            Storage::disk(env('FILESYSTEM_DRIVER'))->put($path, $compressed);

        }

        // jika video
        if ($request->file('file')->isVideo()) {
            $file->type = 'video/' . $extension;
            $path = $request->file('file')->store('stories', env('FILESYSTEM_DRIVER', 'public'));
        }

        $file->src = $path;
        $file->save();

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
