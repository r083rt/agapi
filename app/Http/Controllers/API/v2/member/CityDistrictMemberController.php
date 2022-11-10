<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class CityDistrictMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cityId)
    {
        //ambil district berdasarkan city id dengan total users yang memiliki role_id [2, 7, 9, 10, 11] dan user_activated_at != null
        $districts = District::where('city_id', $cityId)->withCount(['users' => function ($query) {
            $query->where('user_activated_at', '!=', null)
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        }])->paginate();
        return response()->json($districts);
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
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        }])->paginate();
        return response()->json($districts);
    }
}
