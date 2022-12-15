<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //
        $modules = Module::with('user', 'grade', 'template')
            ->where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($modules);
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
        $cover = $request->cover;
        //upload cover
        $fileName = time() . '.' . 'png';
        $compressedImage = \Image::make($cover)->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 60);
        $folderPath = "cover";
        $path = "{$folderPath}/{$fileName}";
        Storage::disk(env('FILESYSTEM_DRIVER', 'wasabi'))->put($path, $compressedImage);

        return $path;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId, $moduleId)
    {
        //
        $modules = Module::with('user', 'grade', 'template')->findOrFail($moduleId);

        return response()->json($modules);
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

    public function search($keyword)
    {
        $modules = Module::with('user', 'grade', 'template')
            ->where('user_id', auth('api')->user()->id)
            ->where('name', 'like', "%$keyword%")
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($modules);
    }
}
