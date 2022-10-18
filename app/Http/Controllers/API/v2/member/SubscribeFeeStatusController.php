<?php

namespace App\Http\Controllers\API\v2\member;

use App\Helper\Membership;
use App\Helper\Midtrans;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class SubscribeFeeStatusController extends Controller
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
            ->where('key', 'perpanjangan_anggota')
// where created_at is today
            ->whereDate('created_at', now())
            ->where('status', 'pending')
            ->get();

// return response()->json($pendingPayments->first());

        foreach ($pendingPayments as $payment) {
            try {
                $status = Midtrans::status($payment->midtrans_id);
                if ($status->transaction_status == 'settlement') {
                    $payment->status = 'success';
                    $payment->save();
                    // tambah masa aktif
                    Membership::add($payment->user_id, 1);
                }

            } catch (\Exception $e) {

            }
        }

        $successPayments = Payment::where('user_id', auth()->user()->id)
            ->where('key', 'perpanjangan_anggota')
// today
        // where date created is today
            ->whereDate('created_at', now())
            ->where('status', 'success')
            ->count();

        $user = User::find(auth()->user()->id);

        return response()->json([
            'success' => true,
            'message' => 'Data pembayaran perpanjangan hari ini',
            'data' => [
                'pending' => $pendingPayments->count(),
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
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
