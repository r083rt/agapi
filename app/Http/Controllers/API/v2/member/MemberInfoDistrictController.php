<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MemberInfoDistrictController extends Controller
{
    public function index($districId)
    {

        $member = User::whereHas('profile', function ($query) use ($districId){
            $query->where('district_id', $districId)
                ->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
            
                
        })->with('profile.province', 'role', 'profile.city', 'profile.district', 'pns_status', 'banner')
        ->orderBy('name')->paginate();

        return response()->json($member);
    }

    public function searchMember($districId, $keyword)
    {

        $member = User::whereHas('profile', function ($query) use ($districId){
            $query->where('district_id', $districId)
                ->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        })->where('name', 'like', '%' . $keyword . '%')->paginate();


        return response()->json($member);
    }
}
