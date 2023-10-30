<?php

namespace App\Http\Controllers\API\v2\member;

use App\Helper\Midtrans;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;


class PaymentController extends Controller
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

    public function gettotalextendmember()
    {
        $total = Payment::where('status', 'success')->where('value', 65000)->count();
        return response()->json([
            'total' => $total
        ]);
    }

    public function paymentNotif(Request $request)
    {

        new Midtrans();

        try {
            $notif = new \Midtrans\Notification();
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraud = $notif->fraud_status;

        $payment = Payment::where('midtrans_id', $orderId)->firstOrFail();

        if ($transaction == 'capture') {

            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    // $payment->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                    $payment->setPending();
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    // $payment->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                    $payment->setSuccess();
                }
            }
        } elseif ($transaction == 'settlement') {

            // TODO set payment status in merchant's database to 'Settlement'
            // $payment->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $payment->setSuccess();
        } elseif ($transaction == 'pending') {

            // TODO set payment status in merchant's database to 'Pending'
            // $payment->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $payment->setPending();
        } elseif ($transaction == 'deny') {

            // TODO set payment status in merchant's database to 'Failed'
            // $payment->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $payment->setFailed();
        } elseif ($transaction == 'expire') {

            // TODO set payment status in merchant's database to 'expire'
            // $payment->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $payment->setExpired();
        } elseif ($transaction == 'cancel') {

            // TODO set payment status in merchant's database to 'Failed'
            // $payment->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $payment->setFailed();
        }
        return response()->json([
            "status" => "success",
            'message' => 'Notification Handler',
            'fraud' => $transaction,
            'data' => $payment,
        ]);
    }
}
