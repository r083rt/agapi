<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::where('user_activated_at', '!=', null)
            ->whereHas('role', function ($query) {
                $query->whereIn('name', ['user']);
            })
            ->with('role')
            ->paginate(request()->query('per_page'));

        return response()->json($users);
    }

    public function search($keyword)
    {
        $users = User::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('kta_id', 'like', '%' . $keyword . '%')
            ->whereHas('role', function ($query) {
                $query->whereIn('name', ['user']);
            })
            ->with('role')
            ->paginate(request()->query('per_page'));

        return response()->json($users);
    }

    public function memberGrowth(){
        // ambil count users dari awal sampai 2 bulan lalu
        $usersTill2MonthAgo = User::where('user_activated_at', '!=', null)
            ->whereHas('role', function ($query) {
                $query->whereIn('name', ['user']);
            })
            ->whereMonth('user_activated_at', '<', date('m') - 2)
            ->whereYear('user_activated_at', date('Y'))
            ->count();

        // ambil count users dari awal sampai bulan lalu
        $usersTillLastMonth = User::where('user_activated_at', '!=', null)
            ->whereHas('role', function ($query) {
                $query->whereIn('name', ['user']);
            })
            ->whereMonth('user_activated_at', '<', date('m'))
            ->whereYear('user_activated_at', date('Y'))
            ->count();
        // ambil count users dari awal sampai bulan ini
        $usersNow = User::where('user_activated_at', '!=', null)
            ->whereHas('role', function ($query) {
                $query->whereIn('name', ['user']);
            })
            ->whereMonth('user_activated_at', '<=', date('m'))
            ->whereYear('user_activated_at', date('Y'))
            ->count();

        return response()->json([
            'usersTill2MonthAgo' => $usersTill2MonthAgo,
            'usersTillLastMonth' => $usersTillLastMonth,
            'usersNow' => $usersNow,
        ]);
    }
}
