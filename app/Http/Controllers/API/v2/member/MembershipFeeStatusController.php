<?php

namespace App\Http\Controllers\API\v2\member;

use App\Helper\Membership;
use App\Helper\Midtrans;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipFeeStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pendingPayments = Payment::where('user_id', auth()->user()->id)
            ->where('key', 'pendaftaran')
        // where created_at is today
            ->whereDate('created_at', now())
            ->where('status', 'pending')
            ->get();

        foreach ($pendingPayments as $payment) {
            $midtrans = new Midtrans();
            $status = $midtrans->status($payment->midtrans_id);
            if ($status->transaction_status == 'settlement') {
                $payment->status = 'success';
                $payment->save();
                // tambah masa aktif
                Membership::add($payment->user_id, 1);
            }
        }

        $successPayments = Payment::where('user_id', auth()->user()->id)
            ->where('key', 'pendaftaran')
        // today
        // where date created is today
            ->whereDate('created_at', now())
            ->where('status', 'success')
            ->count();

        $user = User::find(auth()->user()->id);

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran hari ini',
            'data' => [
                'pending' => $pendingPayments,
                'success' => $successPayments,
                'expired_at' => $user->expired_at,
            ],
        ]);

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
}
