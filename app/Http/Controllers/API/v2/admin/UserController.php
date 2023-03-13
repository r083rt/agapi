<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::where('user_activated_at', '!=', null)
            ->whereHas('role', function ($query) {
                $query->whereNotIn('name', ['student','admin']);
            })
            ->with('role');

        if(request()->query('search')) {
            $users->where('name', 'like', '%' . request()->query('search') . '%')
                ->orWhere('email', 'like', '%' . request()->query('search') . '%')
                ->orWhere('kta_id', 'like', '%' . request()->query('search') . '%');
        }

        if(request()->query('role')) {
            $users->whereHas('role', function ($query) {
                $query->where('display_name', request()->query('role'));
            });
        }

        $result = $users->paginate(request()->query('per_page'));

        return response()->json($result);
    }

    public function update(Request $request, $id){
        //
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user->load(['role','profile']));
    }

    public function show($id){
        $user = User::findOrFail($id);
        return response()->json($user->load(['role','profile']));
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

    public function memberGrowth()
    {
        // ambil count users dari awal sampai 2 bulan lalu
        $usersTill2MonthAgo = Payment::where('value', 35000)
            ->where('status', 'success')
            ->whereDate('updated_at', '<', date('Y-m-d', strtotime('-2 month')))
            ->count();

        // ambil count users dari awal sampai bulan lalu
        $usersTillLastMonth = Payment::where('value', 35000)
            ->where('status', 'success')
            ->whereDate('updated_at', '<', date('Y-m-d', strtotime('-1 month')))
            ->count();
        // ambil count users dari awal sampai bulan ini
        $usersNow = Payment::where('value', 35000)
            ->where('status', 'success')
            ->whereDate('updated_at', '<', date('Y-m-d'))
            ->count();

        // selisih kenaikan user 2 bulan lalu dengan bulan lalu
        $usersGrowthTillLastMonth = $usersTillLastMonth - $usersTill2MonthAgo;
        // selisih kenaikan user bulan lalu dengan bulan ini
        $usersGrowthTillNow = $usersNow - $usersTillLastMonth;
        // persentase kenaikan user 2 bulan lalu dengan bulan lalu
        $usersGrowthPercentageTillLastMonth = $usersGrowthTillLastMonth / $usersTill2MonthAgo * 100;
        // persentase kenaikan user bulan lalu dengan bulan ini
        $usersGrowthPercentageTillNow = $usersGrowthTillNow / $usersTillLastMonth * 100;

        return response()->json([
            'usersTill2MonthAgo' => $usersTill2MonthAgo,
            'usersTillLastMonth' => $usersTillLastMonth,
            'usersNow' => $usersNow,
            'usersGrowthTillLastMonth' => $usersGrowthTillLastMonth,
            'usersGrowthTillNow' => $usersGrowthTillNow,
            'usersGrowthPercentageTillLastMonth' => round($usersGrowthPercentageTillLastMonth, 2),
            'usersGrowthPercentageTillNow' => round($usersGrowthPercentageTillNow, 2),
        ]);
    }

    public function getUniqueValue($key)
    {
        // ambil unique value dari key dalam bentuk array
        $values = User::whereNotNull($key)->groupBy($key)->get();
        $values = $values->pluck($key)->toArray();
        return response()->json($values);
    }
}
