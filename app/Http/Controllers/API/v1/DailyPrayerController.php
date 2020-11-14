<?php

namespace App\Http\Controllers\API\v1;

use App\Models\DailyPrayer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DailyPrayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = DailyPrayer::with('file')->get();
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
     * @param  \App\Models\DailyPrayer  $dailyPrayer
     * @return \Illuminate\Http\Response
     */
    public function show(DailyPrayer $dailyPrayer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailyPrayer  $dailyPrayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyPrayer $dailyPrayer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyPrayer  $dailyPrayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyPrayer $dailyPrayer)
    {
        //
    }
}
