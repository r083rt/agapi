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
        // $payment_value = setting('admin.member_price');
        $payment_value = 1;
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

        $paymentUrl = Midtrans::createTransaction($payload)->redirect_url;

        return response()->json([
            "message" => "Link pembayaran berhasil dibuat",
            "data" => [
                "payment_url" => $paymentUrl,
            ],
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
