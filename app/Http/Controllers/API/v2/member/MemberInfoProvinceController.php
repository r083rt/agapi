<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MemberInfoProvinceController extends Controller
{
    public function index($provinceId)
    {
        $member = User::whereHas('profile', function ($query) use ($provinceId){
            $query->where('province_id', $provinceId)
                ->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        })->paginate();

        return response()->json($member);
    }

    public function searchMember($provinceId,$keyword)
    {
        $member = User::whereHas('profile', function ($query) use ($provinceId){
            $query->where('province_id', $provinceId)
                ->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        })->where('name', 'like', '%' . $keyword . '%')
        ->with('profile.province', 'role', 'profile.city', 'profile.district', 'pns_status', 'banner')
        ->paginate();

        return response()->json($member);
    }

    public function searchAllMember($keyword)
    {
        $member = User::whereHas('profile', function ($query){
            $query->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        })->where('name', 'like', '%' . $keyword . '%')
        ->with('profile.province', 'role', 'profile.city', 'profile.district', 'pns_status', 'banner')->paginate();

        return response()->json($member);
    }
}
