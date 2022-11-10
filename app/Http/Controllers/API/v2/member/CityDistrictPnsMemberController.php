<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class CityDistrictPnsMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cityId)
    {
        //ambil district berdasarkan city id dengan total users yang is_pns = 1 dan user_activated_at != null
        $districts = District::where('city_id', $cityId)->withCount(['users' => function ($query) {
            $query->where('user_activated_at', '!=', null)
                ->whereHas('pns_status', function ($query2) {
                    $query2->where('is_pns', 1);
                });
        }])->paginate();
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

    public function search($cityId, $keyword)
    {
        $districts = District::where('city_id', $cityId)->where('name', 'like', '%' . $keyword . '%')->withCount(['users' => function ($query) {
            $query->where('user_activated_at', '!=', null)
                ->whereHas('pns_status', function ($query2) {
                    $query2->where('is_pns', 1);
                });
        }])->paginate();
        return response()->json($districts);
    }
}
