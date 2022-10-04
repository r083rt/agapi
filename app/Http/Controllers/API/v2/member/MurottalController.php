<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Member\Murottal;
use Illuminate\Http\Request;

class MurottalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Murottal::with('audio')->paginate();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member\Murottal  $murottal
     * @return \Illuminate\Http\Response
     */
    public function show(Murottal $murottal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member\Murottal  $murottal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Murottal $murottal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member\Murottal  $murottal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Murottal $murottal)
    {
        //
    }
}
