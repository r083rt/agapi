<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class Kongres2022PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function getPaymentUsers()
    {
        $payments = Payment::join('users', 'users.id', '=', 'payments.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('provinces', 'provinces.id', '=', 'profiles.province_id')
            ->with('user')
            ->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->select(
                'provinces.id as id',
                DB::raw('count(payments.id) as total_payment'),
                'provinces.name as name'
            )
            ->groupBy('name')
            ->paginate();
        return response()->json($payments);
    }

    public function getPaymentUsersCount()
    {
        $payments = Payment::with('user')->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->count();
        return response()->json([
            'total' => $payments
        ]);
    }

    public function search($keyword)
    {
        $payments = Payment::join('users', 'users.id', '=', 'payments.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('provinces', 'provinces.id', '=', 'profiles.province_id')
            ->with('user')
            ->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->where('users.name', 'like', '%' . $keyword . '%')
            ->select(
                'provinces.id as id',
                DB::raw('count(payments.id) as total_payment'),
                'provinces.name as name'
            )
            ->groupBy('name')
            ->paginate();
        return response()->json($payments);
    }
}
