<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Carbon\Carbon;
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
        //convert $request->cover to file
        $cover = $request->cover;
        $cover = str_replace('data:image/png;base64,', '', $cover);
        $cover = str_replace(' ', '+', $cover);
        $cover = base64_decode($cover);

        $module = new Module();
        $module->name = json_decode($request->name);
        $module->user_id = auth('api')->user()->id;
        $module->description = json_decode($request->description);
        $module->is_publish = json_decode($request->is_publish);
        $module->grade_id = json_decode($request->grade_id);
        $module->subject = json_decode($request->subject);
        $module->year = Carbon::now()->format('Y');
        //upload cover
        $fileName = time() . '.' . 'png';
        $compressedImage = \Image::make($cover)->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 60);
        $folderPath = "cover";
        $path = "{$folderPath}/{$fileName}";
        Storage::disk(env('FILESYSTEM_DRIVER', 'wasabi'))->put($path, $compressedImage);
        $canvas_data = [
            'image' => $path
        ];
        $module->canvas_data = json_encode($canvas_data);
        $module->save();

        if($request->has('contents')){
            $module->module_contents()->createMany($request->contents);
        }

        return response()->json($module);
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
        $modules = Module::with('user', 'grade', 'template', 'module_contents')->findOrFail($moduleId);

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
        //convert $request->cover to file
        $cover = $request->cover;
        $cover = str_replace('data:image/png;base64,', '', $cover);
        $cover = str_replace(' ', '+', $cover);
        $cover = base64_decode($cover);

        $module = Module::findOrFail($request['id']);
        $module->name = json_decode($request->name);
        $module->user_id = auth('api')->user()->id;
        $module->description = json_decode($request->description);
        $module->is_publish = json_decode($request->is_publish);
        $module->grade_id = json_decode($request->grade_id);
        $module->subject = json_decode($request->subject);
        $module->year = Carbon::now()->format('Y');
        //upload cover
        $fileName = time() . '.' . 'png';
        $compressedImage = \Image::make($cover)->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 60);
        $folderPath = "cover";
        $path = "{$folderPath}/{$fileName}";
        Storage::disk(env('FILESYSTEM_DRIVER', 'wasabi'))->put($path, $compressedImage);
        $canvas_data = [
            'image' => $path
        ];
        $module->canvas_data = json_encode($canvas_data);
        $module->save();

        if ($request->has('contents')) {
            $module->module_contents()->delete();
            $module->module_contents()->createMany($request->contents);
        }

        return response()->json($module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $module = Module::findOrFail($request->moduleId);
        $module->delete();

        return response()->json($module);
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
