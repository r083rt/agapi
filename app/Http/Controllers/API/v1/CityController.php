<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('districts')->get();
        return response()->json($cities);
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
        $city = City::with(['districts' => function ($query) {
            $query->withCount(['users' => function ($query) {
                $query->where('user_activated_at', '!=', null);
                $query->whereIn('role_id', [2, 7, 9, 10, 11]);
            }]);
        }])->find($id);
        return response()->json($city);
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

    public function getPnsCount($cityId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->count();
        return response()->json($res);
    }

    public function getPnsUsers($cityId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->paginate();
        return response()->json($res);
    }

    public function getNonPnsCount($cityId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->count();
        return response()->json($res);
    }

    public function getNonPnsUsers($cityId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->paginate();
        return response()->json($res);
    }

    public function searchPnsUsers($cityId, $key)
    {
        $search = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();

        return response()->json($search);
    }

    public function searchNonPnsUsers($cityId, $key)
    {
        $search = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();

        return response()->json($search);
    }

    public function getExpiredMembersCount($cityId)
    {
        $res = User::whereHas('profile', function ($query) use ($cityId) {
            $query->where('city_id', $cityId);
        })
            ->where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonths(6))
            ->count();
        return response()->json($res);
    }

    public function getExpiredMembers($cityId)
    {
        $res = User::whereHas('profile', function ($query) use ($cityId) {
            $query->where('city_id', $cityId);
        })
            ->where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonths(6))
            ->paginate();
        return response()->json($res);
    }

    public function searchExpiredMembers($cityId, $key)
    {
        $search = User::whereHas('profile', function ($query) use ($cityId) {
            $query->where('city_id', $cityId);
        })
            ->where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonth(6))
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();
        return response()->json($search);
    }

    public function getPaymentsExtended($provinceId)
    {
        $res = DB::table('cities')
        // join ke table profiles
            ->join('profiles', 'cities.id', '=', 'profiles.city_id')
        // join ke table users
            ->join('users', 'profiles.user_id', '=', 'users.id')
        // join ke table payments melalui users
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->where('profiles.province_id', $provinceId)
            ->where('payments.status', '=', 'success')
            ->where('payments.value', 65000)
            ->select(
                'cities.id as id',
                'cities.name as name',
                // count payment
                DB::raw('count(payments.id) as total_payment'),
            )
            ->groupBy('name')
            ->get();
        return response()->json($res);
    }

    public function getPaymentsExtendedCount($provinceId)
    {
        $res = DB::table('users')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
        // join ke table payments melalui users
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->where('profiles.province_id', $provinceId)
            ->where('payments.status', '=', 'success')
            ->where('payments.value', 65000)
            ->count(
                'payments.value'
            );

        return response()->json($res);
    }
}
