<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class CityDistrictInpassingController extends Controller
{
    public function index($cityId)
    {
        //
        $districts = District::where('city_id', $cityId)
        ->withCount(['users' => function ($query) {
            $query->whereHas('pns_status', function ($query2) {
                $query2->where('is_non_pns_inpassing', '1');
            });
        }])->paginate();

        return response()->json($districts);
    }

    public function search($cityId, $keyword)
    {
        $districts = District::where('city_id', $cityId)
            ->withCount(['users' => function ($query) {
                $query->whereHas('pns_status', function ($query2) {
                    $query2->where('is_non_pns_inpassing', '1');
                });
            }])->where('name', 'like', '%' . $keyword . '%')
            ->paginate();
        return response()->json($districts);
    }
}
