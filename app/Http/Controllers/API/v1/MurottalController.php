<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Murottal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $res = Murottal::with('file')->get();
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
     * @param  \App\Models\Murottal  $murottal
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
     * @param  \App\Models\Murottal  $murottal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Murottal $murottal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Murottal  $murottal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Murottal $murottal)
    {
        //
    }
}
