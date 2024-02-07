<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
class ProvinceExtendMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provinces = DB::table('provinces')
            // join ke table profiles
            ->join('profiles', 'provinces.id', '=', 'profiles.province_id')
            // join ke table users
            ->join('users', 'profiles.user_id', '=', 'users.id')
            // join ke table payments melalui users
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->where('payments.status', '=', 'success')
            ->whereIn('payments.value', [65000, 200000, 1350000])
            ->select(
                'provinces.id as id',
                'provinces.name as name',
                // count payment
                DB::raw('count(payments.id) as total_payment'),
            )
            ->groupBy('name')
            ->paginate();

        $total = Payment::where('status', 'success')->whereIn('value',  [65000, 200000, 1350000])->count();
   

        return response()->json(['total'=>$total,'member'=>$provinces]);
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
        $provinces = DB::table('provinces')
            // join ke table profiles
            ->join('profiles', 'provinces.id', '=', 'profiles.province_id')
            // join ke table users
            ->join('users', 'profiles.user_id', '=', 'users.id')
            // join ke table payments melalui users
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->where('payments.status', '=', 'success')
            ->where('payments.value', 65000)
            ->where('provinces.name', 'like', '%' . $keyword . '%')
            ->select(
                'provinces.id as id',
                'provinces.name as name',
                // count payment
                DB::raw('count(payments.id) as total_payment'),
            )
            ->groupBy('name')
            ->paginate();

        return response()->json($provinces);
    }
}
