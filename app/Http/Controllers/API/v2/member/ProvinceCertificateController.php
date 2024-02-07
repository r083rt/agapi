<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\User;

class ProvinceCertificateController extends Controller
{
    public function index()
    {
        //
        $province = Province::
        withCount(['users' => function ($query) {
            $query->whereHas('pns_status', function ($query2) {
                $query2->where('is_certification', '1');
            });
        }])->paginate();

        $total = User::whereHas('pns_status', function ($query) {
            $query->where('is_certification', '1');
        })->count();

       
        return response()->json(['total'=>$total,'member'=>$province]);
    }

    public function search($keyword)
    {
        $province = Province::where('name', 'like', '%' . $keyword . '%')
            ->withCount(['users' => function ($query) {
                $query->whereHas('pns_status', function ($query2) {
                    $query2->where('is_certification', '1');
                });
            }])
            ->paginate();
        return response()->json($province);
    }
}
