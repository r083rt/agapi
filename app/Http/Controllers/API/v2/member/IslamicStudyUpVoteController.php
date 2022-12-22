<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\IslamicStudy;
use App\Models\Upvote;
use Illuminate\Http\Request;

class IslamicStudyUpVoteController extends Controller
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
        $islamic_study = IslamicStudy::findOrFail($request->islamicStudyId);

        $islamic_study->loadCount('downvoted');

        if ($islamic_study->downvoted_count > 0) {
            $islmaicStudy = IslamicStudy::findOrFail($request->islamicStudyId);
            $islmaicStudy->downvotes()->where('user_id', auth('api')->user()->id)->delete();
        }

        $upvote = new \App\Models\Upvote;
        $upvote->user_id = auth('api')->user()->id;
        $islamic_study->upvotes()->save($upvote);


        return response()->json($islamic_study->load('upvoted', 'downvoted')->loadCount('upvotes', 'downvotes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Upvote  $upvote
     * @return \Illuminate\Http\Response
     */
    public function show(Upvote $upvote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upvote  $upvote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upvote $upvote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upvote  $upvote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $islmaicStudy = IslamicStudy::findOrFail($request->islamicStudyId);
        $islmaicStudy->upvotes()->where('user_id', auth('api')->user()->id)->delete();

        return response()->json($islmaicStudy->loadCount('upvotes'));
    }
}
