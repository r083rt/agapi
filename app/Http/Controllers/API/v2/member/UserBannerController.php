<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //find user by id and input banner morph to files table and save
        $fileName = time() . '.' . $request->file('banner')->extension();

        $compressedImage = \Image::make($request->file('banner'))->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 60);
        $folderPath = "avatar";
        $path = "{$folderPath}/{$fileName}";
        // simpan gambar
        Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $compressedImage);

        $user = User::findOrFail(auth('api')->user()->id);
        $user->banner()->create([
            'src' => $path,
            'type' => $request->file('banner')->getMimeType(),
            'name' => $fileName,
        ]);

        return response()->json([
            'message' => 'Banner uploaded successfully',
            'data' => $user->banner
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
    }
}
