<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class UserStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = File::where('key', 'story')
            ->where('file_id', auth('api')->user()->id)
            ->where('file_type', 'App\Models\User')->paginate();
        return response()->json($res);
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
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        $file = $request->file('file');
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->store('story', 'wasabi');
        $db = new File();
        $db->key = 'story';
        $db->file_id = auth('api')->user()->id;
        $db->file_type = 'App\Models\User';
        $db->name = $file_name;
        $db->src = $path;
        $db->save();
        return response()->json($db);
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
        $res = File::findOrFail($id);
        return response()->json($res);
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
        return response()->json(File::destroy($id));
    }
}
