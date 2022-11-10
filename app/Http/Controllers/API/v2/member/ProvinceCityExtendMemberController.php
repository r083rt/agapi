<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class ProvinceCityExtendMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinceId)
    {
        //ambil cities berdasarkan province_id beserta total payment yang value 65000 dan success
        $cities = City::where('province_id', $provinceId)
            ->withCount([
                'users', function ($query) {
                    $query->whereHas('payments', function ($query) {
                        $query->where('status', 'success')
                            ->where('value', 65000);
                    });
                }
            ])
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
        $cities = City::where('province_id', $provinceId)
            ->where('name', 'like', '%' . $keyword . '%')
            ->withCount([
                'users', function ($query) {
                    $query->whereHas('payments', function ($query) {
                        $query->where('status', 'success')
                            ->where('value', 65000);
                    });
                }
            ])
            ->paginate();
        return response()->json($cities);
    }
}
