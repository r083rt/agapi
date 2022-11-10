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
        $cities = City::where('province_id', $provinceId)->withCount(['users' => function ($query) {
            $query->where('user_activated_at', '!=', null)
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
        $cities
            = City::where('province_id', $provinceId)->withCount(['users' => function ($query) {
                $query->where('user_activated_at', '!=', null)
                    ->whereIn('role_id', [2, 7, 9, 10, 11]);
            }])
            ->where('name', 'like', '%' . $keyword . '%')
            ->paginate();

        return response()->json($cities);
    }
}
