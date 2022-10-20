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
                DB::raw('(SELECT created_at FROM stories WHERE file_id = users.id AND file_type = App\Models\Member\User ORDER BY created_at DESC LIMIT 1) as last_story'),
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
            'image' => 'required|image',
        ]);

        $file = new File();
        $file->key = 'story';
        $file->file_type = 'App\Models\Member\User';
        $file->file_id = $request->user()->id;

        $compressed = \Image::make($request->file('image'))->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 60);

        $fileName = time() . '.jpg';
        $path = 'stories/' . $fileName;
        Storage::disk(env('FILESYSTEM_DRIVER'))->put($path, $compressed);

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
