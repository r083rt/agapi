<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\City;
class MemberInfoCityController extends Controller
{
    public function index($cityId)
    {

        $member = User::whereHas('profile', function ($query) use ($cityId){
            $query->where('city_id', $cityId)
                ->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        })->paginate();

     

        return response()->json($member);
    }

    public function searchMember($cityId, $keyword)
    {

        $member = User::whereHas('profile', function ($query) use ($cityId){
            $query->where('city_id', $cityId)
                ->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        })->where('name', 'like', '%' . $keyword . '%')
        ->with('profile.province', 'role', 'profile.city', 'profile.district', 'pns_status', 'banner')->paginate();

     

        return response()->json($member);
    }
}
