<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\LessonPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserLessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //
        $lessonplans = LessonPlan::where('user_id', $userId)
            ->with([
                'grade',
                'likes',
                'user',
            ])->withCount(['likes'])
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($lessonplans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //cek type data request
        if (is_string($request->contents)) {
            $request->contents = json_decode($request->contents, true);
        }

        //convert $request->cover to file
        $cover = json_decode($request->cover);
        $cover = str_replace('data:image/png;base64,', '', $cover);
        $cover = str_replace(' ', '+', $cover);
        $cover = base64_decode($cover);
        // return $cover;
        //convert $cover to file

        //decode $request->all()
        $request->merge(json_decode($request->all(), true));

        $lessonplan = new LessonPlan();
        $lessonplan->creator_id = $request->user()->id;
        $lessonplan->school = $request->user()->profile->school_place ?? 'Kosong';
        $lessonplan->effort = 100;

        $image = json_decode($request->cover);
        // return response()->json($request->hasFile('cover'));
        $fileName = time() . '.' . 'png';
        $compressedImage = \Image::make($cover)->resize(1080, null, function ($constraint) {
            $constraint->aspectRatio();
        })->encode('jpg', 60);
        $folderPath = "cover";
        $path = "{$folderPath}/{$fileName}";
        Storage::disk(env('FILESYSTEM_DRIVER', 'wasabi'))->put($path, $compressedImage);
        $lessonplan->image = $path;

        $request->user()->lesson_plans()->save($lessonplan);

        if ($request->has('contents')) {
            $lessonplan->contents()->createMany($request->contents);
        }

        return response()->json($lessonplan);
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

    public function search($keyword)
    {
        $lessonplans = LessonPlan::where('user_id', auth('api')->user()->id)
            ->where('topic', 'like', "%$keyword%")
            ->with([
                'grade',
                'likes',
                'user',
            ])->withCount(['likes'])
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($lessonplans);
    }
}
