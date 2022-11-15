<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->with('profile')
            ->paginate();

        return response()->json($users);
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
        //
        $user = User::with('profile', 'pns_status')->findOrFail($id);
        return response()->json($user);
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

    public function gettotalmember()
    {
        $total = User::where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->count();
        return response()->json([
            'total' => $total
        ]);
    }

    public function gettotalpnsmember()
    {
        $total = User::whereHas('pns_status', function ($query) {
            $query->where('is_pns', '1');
        })->count();
        return response()->json([
            'total' => $total
        ]);
    }

    public function gettotalnonpnsmember()
    {
        $total = User::whereHas('pns_status', function ($query) {
            $query->where('is_pns', '0');
        })->count();
        return response()->json([
            'total' => $total
        ]);
    }

    public function gettotalexpiredmember()
    {
        $total = User::where('user_activated_at', '!=', null)
            ->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->count();
        return response()->json([
            'total' => $total
        ]);
    }

    public function search($keyword)
    {
        $users = User::where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('kta_id', 'like', '%' . $keyword . '%')
            ->with('profile')
            ->paginate();

        return response()->json($users);
    }
}
