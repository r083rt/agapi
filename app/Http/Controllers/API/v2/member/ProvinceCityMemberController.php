<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class ProvinceCityMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinceId)
    {
        //
        //find all cities in province with total member
        $cities = DB::table('cities')
            ->select('cities.id', 'cities.name', 'cities.province_id', DB::raw('count(member.id) as total_member'))
            ->join('member', 'member.cities_id', '=', 'cities.id')
            ->where('cities.province_id', $provinceId)
            ->groupBy('cities.id')
            ->paginate();

        return response()->json($cities);
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
    public function destroy($id)
    {
        //
    }

    public function search($provinceId, $keyword)
    {
        $cities = DB::table('cities')
            ->select('cities.id', 'cities.name', 'cities.province_id', DB::raw('count(member.id) as total_member'))
            ->join('member', 'member.cities_id', '=', 'cities.id')
            ->where('cities.province_id', $provinceId)
            ->where('cities.name', 'like', '%' . $keyword . '%')
            ->groupBy('cities.id')
            ->paginate();

        return response()->json($cities);
    }
}
