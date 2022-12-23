<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\IslamicStudy;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserIslamicStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //
        $islamic_studies = IslamicStudy::with('category', 'thumbnail')
        ->where('user_id', $userId)
        ->orderBy('id', 'desc')
        ->paginate();

        return response()->json($islamic_studies);
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
        $islamic_study = new IslamicStudy($request->all());
        $islamic_study->user_id = auth('api')->user()->id;
        $islamic_study->save();

        if ($request->hasFile('video')) {
            $islamic_study->thumbnail()->create([
                'name' => 'content',
                'src' => $request->file('video')->store('files', 'wasabi'),
                'type' => $request->file('thumbnail')->getExtension(),
                'key' => 'content_islamic_study'
            ]);
        }

        if($request->hasFile('thumbnail')){
            //find user by id and input banner morph to files table and save
            $fileName = time() . '.' . $request->file('thumbnail')->extension();

            $compressedImage = \Image::make($request->file('thumbnail'))->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 60);
            $folderPath = "files";
            $path = "{$folderPath}/{$fileName}";
            // simpan gambar
            Storage::disk('wasabi', null)->put($path, $compressedImage);

            $islamic_study->thumbnail()->create([
                'name' => $fileName,
                'src' => $path,
                'type' => 'image/jpeg',
                'key' => 'thumbnail_islamic_study'
            ]);
        }

        if($request->hasFile('video')){
            $islamic_study->thumbnail()->create([
                'name' => 'content',
                'src' => $request->file('video')->store('files', 'wasabi'),
                'type' => 'video/mp4',
                'key' => 'content_islamic_study'
            ]);
        }

        return response()->json($islamic_study->load('thumbnail', 'content', 'category'));
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
    public function destroy(Request $request)
    {
        //
         $islamic_study = IslamicStudy::findOrFail($request->IslamicStudyId);
         $islamic_study->delete();

         return response()->json($islamic_study);
    }

    public function search($keyword){
        $islamic_studies = IslamicStudy::with('category', 'thumbnail')
        ->where('user_id', auth('api')->user()->id)
        ->where('title', 'like', "%$keyword%")
        ->orderBy('id', 'desc')
        ->paginate();

        return response()->json($islamic_studies);
    }
}
