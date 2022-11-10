<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class CityDistrictExtendMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cityId)
    {
        //ambil district berdasarkan city id dengan total users yang memiliki paymets key 'perpanjangan anggota' dan status  'success
        $districts = District::where('city_id', $cityId)->withCount(['users' => function ($query) {
            $query->whereHas('payments', function ($query2) {
                $query2->where('key', 'perpanjangan anggota')
                    ->where('status', 'success');
            });
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
            $query->whereHas('payments', function ($query2) {
                $query2->where('key', 'perpanjangan anggota')
                    ->where('status', 'success');
            });
        }])->paginate();

        return response()->json($districts);
    }
}
