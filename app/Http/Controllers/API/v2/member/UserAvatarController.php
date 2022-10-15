<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Member\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserAvatarController extends Controller
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
    public function store($userId, Request $request)
    {
        //
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $user = User::findOrFail($userId);

        $fileName = time() . '.' . $request->file('avatar')->extension();

        $compressedImage = \Image::make($request->file('avatar'))->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 60);
        $folderPath = "avatar";
        $path = "{$folderPath}/{$fileName}";
        // simpan gambar
        Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $compressedImage);

        $user->avatar = $path;
        $user->save();

        return response()->json([
            'message' => "Avatar berhasil diupload ke " . env('FILESYSTEM_DRIVER', 'public'),
            'data' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
