<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use Carbon\Carbon;
use App\Models\User;
class ProvinceExpiredMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provinces = Province::withCount(['users' => function ($query) {
            //ambil user yang expired at lebih kecil dari tanggal sekarang
            $query->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                ->whereIn('role_id', [2, 7, 9, 10, 11]);
        }])->paginate();
        $total = User::where('user_activated_at', '!=', null)
            ->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->count();

        return response()->json(['total'=>$total, 'member'=>$provinces]);
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
    public function search($keyword)
    {
        $province = Province::where('name', 'like', '%' . $keyword . '%')
            ->withCount(['users' => function ($query) {
                $query->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
                    ->whereIn('role_id', [2, 7, 9, 10, 11]);
            }])
            ->paginate();
        return response()->json($province);
    }
}
