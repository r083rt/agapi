<?php

namespace App\Http\Controllers\API\v2\member;

use App\Helper\Midtrans;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class MembershipFeeController extends Controller
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
        $user = $request->user();
        $payment_value = setting('admin.member_price');
        // $payment_value = 1;
        $payment_text = "Pembayaran Member KTA";
        $key = "pendaftaran";
        // generate unique Id untuk midtrans transaction
        $midtransId = "AD-$user->id-" . time();

        $payment = new Payment([
            'value' => $payment_value,
            'key' => $key,
            'midtrans_id' => $midtransId,
        ]);

        $user->payments()->save($payment);

        $payload = [
            'transaction_details' => [
                'order_id' => $midtransId,
                'gross_amount' => $payment->value,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => [
                [
                    'id' => $payment->id,
                    'price' => $payment->value,
                    'quantity' => 1,
                    'name' => ucwords(str_replace('_', ' ', $payment_text)),
                ],
            ],
        ];

        $snapToken = Midtrans::getSnapToken($payload);
        $payment->snap_token = $snapToken;
        $payment->save();
        $paymentUrl = Midtrans::createTransaction($payload)->redirect_url;
        

        return response()->json([
            "message" => "Link pembayaran berhasil dibuat",
            "data" => [
                "payment_url" => $paymentUrl,
                "snap_token"=> $snapToken,
                "transaction_id"=>$midtransId
            ],
            "payload" => $payload
           
        ]);
    }


    public function notificationHandler(Request $request)
    {
        try {
            $notif = Midtrans::notification();
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
