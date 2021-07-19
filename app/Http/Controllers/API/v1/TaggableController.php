<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Taggable;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class TaggableController extends Controller
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
     * @param  \App\Models\Taggable  $taggable
     * @return \Illuminate\Http\Response
     */
    public function show(Taggable $taggable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taggable  $taggable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taggable $taggable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taggable  $taggable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taggable $taggable)
    {
        //
    }
    public function assigmentsTag(Request $request){
        $request->validate([
            'tag_ids'=>'nullable|array'
        ]);
        $assigments = \App\Models\Assigment::with('tags')->withCount('question_lists')->whereHas('taggables', function (Builder $query)use($request) {
            if($request->tag_ids)$query->whereIn('taggables.tag_id', $request->tag_ids);
        });
        return $assigments->get();
    }
}
