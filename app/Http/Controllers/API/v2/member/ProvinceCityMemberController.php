<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        //find all city in province with total member
        $city = DB::table('city')
            ->select('city.id', 'city.name', 'city.province_id', DB::raw('count(member.id) as total_member'))
            ->join('member', 'member.city_id', '=', 'city.id')
            ->where('city.province_id', $provinceId)
            ->groupBy('city.id')
            ->paginate();

        return response()->json($city);
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
        $city = DB::table('city')
            ->select('city.id', 'city.name', 'city.province_id', DB::raw('count(member.id) as total_member'))
            ->join('member', 'member.city_id', '=', 'city.id')
            ->where('city.province_id', $provinceId)
            ->where('city.name', 'like', '%' . $keyword . '%')
            ->groupBy('city.id')
            ->paginate();

        return response()->json($city);
    }
}
