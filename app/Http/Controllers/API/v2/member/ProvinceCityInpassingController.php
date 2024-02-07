<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class ProvinceCityInpassingController extends Controller
{
    public function index($provinceId,)
    {
        //
        $cities = City::where('province_id', $provinceId)
        ->withCount(['users' => function ($query) {
            $query->whereHas('pns_status', function ($query2) {
                $query2->where('is_non_pns_inpassing', '1');
            });
        }])->paginate();

        return response()->json($cities);
    }

    public function search($provinceId, $keyword)
    {
        $cities = City::where('province_id', $provinceId)
            ->withCount(['users' => function ($query) {
                $query->whereHas('pns_status', function ($query2) {
                    $query2->where('is_non_pns_inpassing', '1');
                });
            }])->where('name', 'like', '%' . $keyword . '%')
            ->paginate();
        return response()->json($cities);
    }
}
