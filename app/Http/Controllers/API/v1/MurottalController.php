<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Click;
use App\Models\Murottal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $res = Murottal::with('file')->paginate();
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

    public function listening(Request $request)
    {
        // return response()->json($request->all());
        // $click = Click::whereDate('created_at', \Carbon\Carbon::now())
        //                 ->exists();
        // if(!$click){
        $murottal = Murottal::findOrFail($request->id);
        $listening = new Click();
        $listening->user_id = auth('api')->user()->id;
        $murottal->listening()->save($listening);

        return response()->json($murottal->load("listening"));
        // }

        // return response()->json($click);
    }

    public function listening_show()
    {
        // $res = Click::with("user", "murottal")
        //                 ->where('clickable_type', 'App\Models\Murottal')
        //                 ->whereDate('created_at', \Carbon\Carbon::today())
        //                 ->get();
        $today = \Carbon\Carbon::now()->toDateTimeString();
        $res = DB::table('clicks')
            ->join("murottals as m", "m.id", "=", "clicks.clickable_id")
            ->join("users as u", "u.id", "=", "clicks.user_id")
        // ->select("clicks.id, m.name as murottal_name, u.name as")
            ->select(
                DB::raw('clicks.id'),
                DB::raw('clicks.created_at'),
                DB::raw('m.name as murottal_name'),
                DB::raw('u.name as user_name')
            )
            ->groupBy('clicks.id')
            ->where("clicks.clickable_type", "=", "App\Models\Murottal")
            ->where("clicks.created_at", ">", $today)
            ->get();
        return $res;
    }

}
