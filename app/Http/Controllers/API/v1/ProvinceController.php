<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::with('cities')->withCount(['users' => function ($query) {
            $query->where('user_activated_at', '!=', null);
            $query->whereIn('role_id', [2, 7, 9, 10, 11]);
        }])->get();
        return response()->json($provinces);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $province = Province::with(['cities' => function ($query) {
            $query->withCount(['users' => function ($query) {
                $query->where('user_activated_at', '!=', null);
                $query->whereIn('role_id', [2, 7, 9, 10, 11]);
            }]);
        }])->find($id);
        return response()->json($province);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getProvinceById($provinceId)
    {
        $res = Province::findOrFail($provinceId);
        return response()->json($res);
    }

    public function getProvinces()
    {
        $res = Province::get();
        return response()->json($res);
    }

    public function getPnsCount($provinceId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->count();
        return response()->json($res);
    }

    public function getPnsUsers($provinceId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->paginate();
        return response()->json($res);
    }

    public function getNonPnsCount($provinceId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->count();
        return response()->json($res);
    }

    public function getNonPnsUsers($provinceId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->paginate();
        return response()->json($res);
    }

    public function searchPnsUsers($provinceId, $key)
    {
        // return response()->json([$provinceId, $key]);
        $search = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();

        return response()->json($search);
    }

    public function searchNonPnsUsers($provinceId, $key)
    {
        $search = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();

        return response()->json($search);
    }

    public function getExpiredMembersCount($provinceId)
    {
        $res = User::whereHas('profile', function ($query) use ($provinceId) {
            $query->where('province_id', $provinceId);
        })
            ->where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonths(6))
            ->count();
        return response()->json($res);
    }

    public function getExpiredMembers($provinceId)
    {
        $res = User::whereHas('profile', function ($query) use ($provinceId) {
            $query->where('province_id', $provinceId);
        })
            ->where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonths(6))
            ->paginate();
        return response()->json($res);
    }

    public function searchExpiredMembers($provinceId, $key)
    {
        $search = User::whereHas('profile', function ($query) use ($provinceId) {
            $query->where('province_id', $provinceId);
        })
            ->where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonth(6))
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();
        return response()->json($search);
    }

    public function getPaymentsExtended()
    {
        $res = DB::table('provinces')
        // join ke table profiles
            ->join('profiles', 'provinces.id', '=', 'profiles.province_id')
        // join ke table users
            ->join('users', 'profiles.user_id', '=', 'users.id')
        // join ke table payments melalui users
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->where('payments.status', '=', 'success')
            ->where('payments.value', 65000)
            ->select(
                'provinces.id as id',
                'provinces.name as name',
                // count payment
                DB::raw('count(payments.id) as total_payment'),
            )
            ->groupBy('name')
            ->get();
        return response()->json($res);
    }
}
