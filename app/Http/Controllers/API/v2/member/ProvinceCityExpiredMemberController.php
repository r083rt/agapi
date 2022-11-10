<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class ProvinceCityExpiredMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinceId)
    {
        //
        $cities = City::where('province_id', $provinceId)->withCount(['users' => function ($query) {
            //ambil user yang expired at lebih kecil dari tanggal sekarang
            $query->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        }])->paginate();

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
        $cities = City::where('province_id', $provinceId)->where('name', 'like', '%' . $keyword . '%')->withCount(['users' => function ($query) {
            //ambil user yang expired at lebih kecil dari tanggal sekarang
            $query->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        }])->paginate();

        return response()->json($cities);
    }
}
