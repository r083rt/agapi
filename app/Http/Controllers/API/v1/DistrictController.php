<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\User;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::get();
        return response()->json($districts);
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
        $district = District::with(['users' => function ($query) {
            $query->where('user_activated_at', '!=', null);
            $query->whereIn('role_id', [2, 7, 9, 10, 11]);
            $query->with(['books', 'posts.files', 'events', 'guest_events']);
            $query->withCount(['lesson_plans', 'question_lists']);
        }])->find($id);
        return response()->json($district);
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

    public function getPnsCount($districtId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })
            ->count();
        return response()->json($res);
    }

    public function getPnsUsers($districtId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })
            ->paginate();
        return response()->json($res);
    }

    public function getNonPnsCount($districtId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })
            ->count();
        return response()->json($res);
    }

    public function getNonPnsUsers($districtId)
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })
            ->paginate();
        return response()->json($res);
    }

    public function searchPnsUsers($districtId, $key)
    {
        $search = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();

        return response()->json($search);
    }

    public function searchNonPnsUsers($districtId, $key)
    {
        $search = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();

        return response()->json($search);
    }

    public function getExpiredMembersCount($districtId)
    {
        $res = User::whereHas('profile', function ($query) use ($districtId) {
            $query->where('district_id', $districtId);
        })
            ->where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonths(6))
            ->count();
        return response()->json($res);
    }

    public function getExpiredMembers($districtId)
    {
        $res = User::whereHas('profile', function ($query) use ($districtId) {
            $query->where('district_id', $districtId);
        })
            ->where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonths(6))
            ->paginate();
        return response()->json($res);
    }

    public function searchExpiredMembers($districtId, $key)
    {
        $search = User::whereHas('profile', function ($query) use ($districtId) {
            $query->where('district_id', $districtId);
        })
            ->where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonth(6))
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();
        return response()->json($search);
    }
}
