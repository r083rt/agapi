<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\File;

class MemberCardController extends Controller
{
    //
    public function generateFrontCard()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        // jika user->membercard sudah ada maka langsung return src nya
        if ($user->front_membercard) {
            return response()->json([
                'data' => $user->front_membercard->src,
                'message' => 'Kartu Tanda Anggota Ditemukan',
            ]);
        }

        $url = env('APP_URL');

        $userId = auth()->user()->id;
        $nodePath = env('NODE_BINARY_PATH');
        $npmPath = env('NPM_BINARY_PATH');
        $chromePath = env('CHROME_BINARY_PATH');

        $file = Browsershot::url("$url/user/$userId/membercard/front")
        ->noSandbox()
            ->windowSize(370, 667)
            ->fullPage()
            ->setNodeBinary($nodePath)
            ->setNpmBinary($npmPath)
            ->setChromePath($chromePath)
            ->base64Screenshot();

        // ubah base64 menjadi file
        $file = base64_decode($file);
        $path = "membercard/{$userId}_front.png";
        // simpan base64 ke storage wasabi
        $status = Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $file);
        $type = 'image/png';

        if (!$status) {
            return response()->json([
                'data' => null,
                'message' => 'Kartu Tanda Anggota Gagal Dibuat',
            ]);
        }

        $user->front_membercard()->create([
            'src' => $path,
            // 'size' => $size,
            'type' => $type,
            'key' => 'front_membercard'
        ]);

        return response()->json([
            'data' => $path,
            'message' => 'Kartu Tanda Anggota Berhasil Dibuat',
        ]);
    }

    public function generateBackCard()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        // jika user->membercard sudah ada maka langsung return src nya
        if ($user->back_membercard) {
            return response()->json([
                'data' => $user->back_membercard->src,
                'message' => 'Kartu Tanda Anggota Ditemukan',
            ]);
        }

        $url = env('APP_URL');

        $userId = auth()->user()->id;
        $nodePath = env('NODE_BINARY_PATH');
        $npmPath = env('NPM_BINARY_PATH');
        $chromePath = env('CHROME_BINARY_PATH');

        $file = Browsershot::url("$url/user/$userId/membercard/back")
        ->noSandbox()
            ->windowSize(370, 667)
            ->fullPage()
            ->setNodeBinary($nodePath)
            ->setNpmBinary($npmPath)
            ->setChromePath($chromePath)
            ->base64Screenshot();

        // ubah base64 menjadi file
        $file = base64_decode($file);
        $path = "membercard/{$userId}_back.png";
        // simpan base64 ke storage wasabi
        $status = Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $file);
        $type = 'image/png';

        if (!$status) {
            return response()->json([
                'data' => null,
                'message' => 'Kartu Tanda Anggota Gagal Dibuat',
            ]);
        }

        $user->back_membercard()->create([
            'src' => $path,
            // 'size' => $size,
            'type' => $type,
            'key' => 'back_membercard'
        ]);

        return response()->json([
            'data' => $path,
            'message' => 'Kartu Tanda Anggota Berhasil Dibuat',
        ]);
    }

    public function renewFrontCard()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        $user->front_membercard()->delete();

        $url = env('APP_URL');

        $userId = auth()->user()->id;
        $nodePath = env('NODE_BINARY_PATH');
        $npmPath = env('NPM_BINARY_PATH');
        $chromePath = env('CHROME_BINARY_PATH');

        $file = Browsershot::url("$url/user/$userId/membercard/front")
        ->noSandbox()
            ->windowSize(370, 667)
            ->fullPage()
            ->setNodeBinary($nodePath)
            ->setNpmBinary($npmPath)
            ->setChromePath($chromePath)
            ->base64Screenshot();

        // ubah base64 menjadi file
        $file = base64_decode($file);
        // $path = "membercard/{$userId}_front.png";
        // unique file name
        $path = "membercard/" . $userId . "_" . time() . "_front.png";
        // simpan base64 ke storage wasabi
        $status = Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $file);
        $type = 'image/png';

        if (!$status) {
            return response()->json([
                'data' => null,
                'message' => 'Kartu Tanda Anggota Gagal Dibuat',
            ]);
        }

        $user->front_membercard()->create([
            'src' => $path,
            // 'size' => $size,
            'type' => $type,
            'key' => 'front_membercard'
        ]);

        return response()->json([
            'data' => $path,
            'message' => 'Kartu Tanda Anggota Berhasil Dibuat',
        ]);
    }

    public function renewBackCard()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);

        $user->back_membercard()->delete();

        $url = env('APP_URL');

        $userId = auth()->user()->id;
        $nodePath = env('NODE_BINARY_PATH');
        $npmPath = env('NPM_BINARY_PATH');
        $chromePath = env('CHROME_BINARY_PATH');

        $file = Browsershot::url("$url/user/$userId/membercard/back")
        ->noSandbox()
            ->windowSize(370, 667)
            ->fullPage()
            ->setNodeBinary($nodePath)
            ->setNpmBinary($npmPath)
            ->setChromePath($chromePath)
            ->base64Screenshot();

        // ubah base64 menjadi file
        $file = base64_decode($file);
        // $path = "membercard/{$userId}_front.png";
        // unique file name
        $path = "membercard/" . $userId . "_" . time() . "_back.png";
        // simpan base64 ke storage wasabi
        $status = Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->put($path, $file);
        $type = 'image/png';

        if (!$status) {
            return response()->json([
                'data' => null,
                'message' => 'Kartu Tanda Anggota Gagal Dibuat',
            ]);
        }

        $user->back_membercard()->create([
            'src' => $path,
            // 'size' => $size,
            'type' => $type,
            'key' => 'back_membercard'
        ]);

        return response()->json([
            'data' => $path,
            'message' => 'Kartu Tanda Anggota Berhasil Dibuat',
        ]);
    }
}
