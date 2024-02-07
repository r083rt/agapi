<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class CityDistrictBSIController extends Controller
{
    public function index($cityId)
    {
        $districts = District::where('city_id', $cityId)
            ->withCount(['users' => function ($query) {
                $query->where('user_activated_at', '!=', null)
                    ->whereHas('pns_status', function ($query2) {
                        $query2->where('bank_account_no', '!=', '');
                    });
            }])
            ->paginate();
        return response()->json($districts);
    }

    public function search($cityId, $keyword)
    {
        $districts = District::where('city_id', $cityId)
            ->withCount(['users' => function ($query) {
                $query->where('user_activated_at', '!=', null)
                    ->whereHas('pns_status', function ($query2) {
                        $query2->where('bank_account_no', '!=', '');
                    });
            }])
            ->where('name', 'like', '%' . $keyword . '%')
            ->paginate();
        return response()->json($districts);
    }
}
