<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Downvote;
use App\Models\IslamicStudy;
use Illuminate\Http\Request;

class IslamicStudyDownVoteController extends Controller
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
        $islamic_study = IslamicStudy::withCount('upvoted')->findOrFail($request->islamicStudyId);

        if ($islamic_study[0]->upvoted_count > 0) {
            $islmaicStudy = IslamicStudy::findOrFail($request->islamicStudyId);
            $islmaicStudy[0]->upvotes()->where('user_id', auth('api')->user()->id)->delete();
        }

        $downvote = new \App\Models\Downvote;
        $downvote->user_id = auth('api')->user()->id;
        $islamic_study[0]->downvotes()->save($downvote);


        return response()->json($islamic_study[0]->load('upvoted', 'downvoted')->loadCount('upvotes', 'downvotes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Downvote  $downvote
     * @return \Illuminate\Http\Response
     */
    public function show(Downvote $downvote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Downvote  $downvote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Downvote $downvote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Downvote  $downvote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Downvote $downvote)
    {
        //
    }
}
