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
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $user = User::findOrFail($userId);
        // compress size gambar terlebih dahulu sebelum diupload sebesar 30% menggunakan imagejpeg
        $compressedImage = imagejpeg(imagecreatefromstring(file_get_contents($request->file('avatar'))), null, 30);

        $path = Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put('avatars', $compressedImage);

        return response()->json($path);

        $user->avatar = $path;

        // // store as public
        // $path = $request->file('avatar')->store('users', [
        //     'disk' => env('FILESYSTEM_DRIVER', 'public'),
        //     'visibility' => 'public',
        // ]);
        // $user->avatar = $path;
        $user->save();

        return response()->json([
            'message' => 'Avatar berhasil diubah',
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
