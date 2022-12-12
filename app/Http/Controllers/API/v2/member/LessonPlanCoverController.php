<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LessonPlanCoverController as ControllersLessonPlanCoverController;
use App\Models\LessonPlanCover;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class LessonPlanCoverController extends Controller
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
        //
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

    public function generatecover(Request $request)
    {
        $url = env('APP_URL', 'localhost:8000');
        $cover_length = LessonPlanCover::count();
        $random_cover = LessonPlanCover::take($cover_length)->get()->random(1);

        $data = [
            'image' => $random_cover[0]->image,
            'topic' => $request->topic,
            'grade' => $request->grade['label'],
            'creator' => $request->user()->name,
        ];

        $file = Browsershot::url("$url/lesson-plans/generate/cover")
            ->post($data)
            ->noSandbox()
            ->windowSize(586, 1070)
            ->fullPage()
            ->setNodeBinary(env('NODE_BINARY_PATH', '/usr/bin/node'))
            ->setNpmBinary(env('NPM_BINARY_PATH', '/usr/bin/npm'))
            ->setChromePath(env('CHROME_BINARY_PATH', '/usr/lib/node_modules/chromium'))
            ->base64Screenshot();

        return response()->json([
            'data' => "data:image/png;base64,$file",
            'message' => 'Generate Cover RPP',
        ]);
    }
}
