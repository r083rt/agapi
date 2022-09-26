<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Candidate::with('user', 'votes')->get();
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
        $candidate = new Candidate($request->all());
        $candidate->save();

        return response()->json($candidate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $candidate = Candidate::with('user', 'votes')->findOrFail($id);

        return response()->json($candidate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $candidate = Candidate::findOrFail($request->id);
        $candidate->user_id = $request->user_id;
        $candidate->title = $request->title;
        $candidate->description = $request->description;
        $candidate->save();

        return response()->json($candidate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // return response()->json($candidate);
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();

        return response($candidate);
    }
}
