<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class ModuleCoverController extends Controller
{
    //

    public function index(){
        $templates = Template::get();

        return response()->json($templates);
    }

    public function generatecover(Request $request)
    {
        $cover_length = Template::count();
        $random_cover = Template::take($cover_length)->get()->random(1);

        $user_id = $request->user()->id;
        $cover_id = $random_cover[0]->id;
        $name = $request->name;
        $grade = $request->grade['label'];
        $subject = $request->subject;

        $file = Browsershot::url("https://agpaiidigital.org/module/$user_id/$name/$subject/$grade/generate/cover/$cover_id")
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

    public function generatecoverbycoverid(Request $request)
    {
        $user_id = $request->user()->id;
        $cover_id = $request->coverId;
        $name = $request->name;
        $grade = $request->grade['label'];
        $subject = $request->subject;

        $file = Browsershot::url("https://agpaiidigital.org/module/$user_id/$name/$subject/$grade/generate/cover/$cover_id")
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
