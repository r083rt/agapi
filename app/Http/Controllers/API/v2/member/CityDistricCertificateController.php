<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
class CityDistricCertificateController extends Controller
{
    public function index($districId)
    {
        //
        $districts = District::where('district_id', $districId)
        ->withCount(['users' => function ($query) {
            $query->whereHas('pns_status', function ($query2) {
                $query2->where('is_certification', '1');
            });
        }])->paginate();

        return response()->json($districts);
    }

    public function search($districId, $keyword)
    {
        $districts = District::where('district_id', $districId)
            ->withCount(['users' => function ($query) {
                $query->whereHas('pns_status', function ($query2) {
                    $query2->where('is_certification', '1');
                });
            }])->where('name', 'like', '%' . $keyword . '%')
            ->paginate();
        return response()->json($districts);
    }

}
