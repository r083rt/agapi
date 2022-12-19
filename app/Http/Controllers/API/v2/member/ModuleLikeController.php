<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;

class ModuleLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modules = Module::whereHas('likes', function ($query) {
            $query->where('user_id', auth('api')->user()->id);
        })
            ->with([
                'grade',
                'likes',
                'user',
                'liked'
            ])
            ->withCount(['likes'])
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
        // $liked = Module::findOrfail($request->moduleId)->likes()->create([
        //     'user_id' => auth('api')->user()->id,
        // ]);
        $module = Module::with([
            'grade',
            'likes',
            'user',
            'liked'
        ])->withCount(['likes'])->findOrFail($request->moduleId);
        $module = $module->loadCount('liked');
        if ($module->liked_count == 0) {
            $like = new \App\Models\Like;
            $like->user_id = auth('api')->user()->id;
            $module->likes()->save($like);

            if ($like->likeable->user_id !== $like->user_id) {
                $like->load('likeable', 'user');
                \App\Events\LikedModuleEvent::dispatch($like);
            }
        }
        return response()->json($module);
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
        $liked = Module::findOrfail($request->moduleId)->likes()->where('user_id', auth('api')->user()->id)->delete();

        if ($liked) {
            $module = Module::with([
                'grade',
                'likes',
                'user',
                'liked'
            ])->withCount(['likes'])->findOrFail($request->moduleId);
        }

        return response()->json($module);
    }

    public function search($keyword)
    {
        $modules = Module::whereHas('likes', function ($query) {
            $query->where('user_id', auth('api')->user()->id);
        })
            ->where('name', 'like', "%$keyword%")
            ->with([
                'grade',
                'likes',
                'user',
                'liked'
            ])
            ->withCount(['likes'])
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($modules);
    }
}
