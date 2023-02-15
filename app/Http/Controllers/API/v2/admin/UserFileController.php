<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;

class UserFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //
        $user = User::findOrFail($userId);
        $files = $user->files()->orderBy('created_at','desc')->paginate();
        return response()->json($files);
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
            'file' => 'required|file',
        ]);
        $user = User::findOrFail($userId);

        $path = $request->file('file')->store('files');
        $file = new File;
        $file->name = $request->file('file')->getClientOriginalName();
        $file->type = $request->file('file')->getMimeType();
        $file->size = $request->file('file')->getSize();
        $file->src = $path;

        $user->files()->save($file);
        return response()->json($file);
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
}
