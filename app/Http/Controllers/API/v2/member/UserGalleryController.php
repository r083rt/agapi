<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserGalleryController extends Controller
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
        $gallery = File::join('posts', 'posts.id', '=', 'files.file_id')
            ->where('files.file_type', 'App\Models\Post')
            ->where('posts.author_id', $user->id)
            ->where('files.type', 'like', 'image/' . '%')
            ->where('posts.deleted_at', null)
            // where post exist
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('posts')
                    ->whereRaw('posts.id = files.file_id')
                    ->where('posts.deleted_at', null)
                    ->where('files.file_type', 'App\Models\Post');
            })
            ->select(
                'files.*',
                'posts.id as post_id',
            )
            ->orderBy('files.created_at', 'desc')
            ->paginate();
        return response()->json($gallery);
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
}
