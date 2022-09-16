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
        $res = Candidate::with('user')->get();
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
        $candidate = new Candidate();
        $candidate->save($request->all());

        return response()->json($candidate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
        $candidate = Candidate::findOrFail($candidate->id);

        return response()->json($candidate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
        $candidate = Candidate::findOrFail($candidate->id);
        $candidate->update($request->all());

        return response()->json($candidate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
        $candidate = Candidate::findOrFail($candidate->id);
        $candidate->delete();

        return response($candidate);
    }
}
