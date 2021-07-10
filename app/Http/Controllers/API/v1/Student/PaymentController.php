<?php

namespace App\Http\Controllers\API\v1\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use GuzzleHttp;
use DB;
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
    public function getBalance(Request $request){
        $user = $request->user();
        return $user->balance();

    }
    public function createPayment(Request $request){
        $request->validate([
            'value'=>'required',
            'payment_vendor_id'=>'required|exists:payment_vendors,id'
        ]);
        $user = $request->user();
        $stop = false;
        
        $client = new GuzzleHttp\Client();
        $json_data = ['value'=>$request->value,'payment_vendor'=>$request->payment_vendor_id];
        $res = $client->post(env('MASTER_PAYMENT_URL').'/createpayment',[
            'json'=> $json_data
        ]);
        $master_payment = json_decode($res->getBody());
        if(json_last_error() != JSON_ERROR_NONE){
            return response('Format JSON salah',422);
        }

        $necessary = \App\Models\Necessary::where('name','topup')->first();
        // return $res;
        try{
            DB::beginTransaction();
            $payment = new Payment;
            $payment->necessary_id = $necessary->id;
            $payment->master_payment_id = $master_payment->id;
            $payment->value = $master_payment->value;
            $payment->status = $master_payment->status; //pending
            $payment->type = 'IN';
            $payment->payment_vendor_id = $request->payment_vendor_id;
            $user->payments()->save($payment);
            
            DB::commit();
            // \App\Events\PaymentNew::dispatch($payment);
            return $payment;
            
        }catch (\PDOException $e) {
            DB::rollBack();
            return response($e->getMessage(), 500);
        }
       
    }

    public function notificationHandler(Request $request){
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;
        $orderId = $notif->order_id;
        $payment = Payment::findOrFail($orderId);
        // error_log("Order ID $notif->order_id: "."transaction status = $transaction, fraud staus = $fraud");

        if ($transaction == 'capture') {
            if ($fraud == 'challenge') {
            // TODO Set payment status in merchant's database to 'challenge'
                $payment->setPending();
            }
            else if ($fraud == 'accept') {
            // TODO Set payment status in merchant's database to 'success'
                $payment->setSuccess();
            }
        }else if ($transaction == 'settlement') {

            // TODO set payment status in merchant's database to 'Settlement'
            // $payment->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $payment->setSuccess();
        }else if ($transaction == 'pending') {

            // TODO set payment status in merchant's database to 'Pending'
            // $payment->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $payment->setPending();
        }
        else if ($transaction == 'expire') {

            // TODO set payment status in merchant's database to 'expire'
            // $payment->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $payment->setExpired();
        }
        else if ($transaction == 'cancel') {
            $payment->setFailed();
            // if ($fraud == 'challenge') {
            // // TODO Set payment status in merchant's database to 'failure'
            // }
            // else if ($fraud == 'accept') {
            // // TODO Set payment status in merchant's database to 'failure'
            // }
        }
        else if ($transaction == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $payment->setFailed();
        }
    }
}
