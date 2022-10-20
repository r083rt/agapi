<?php

namespace App\Http\Controllers\API\v1\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

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
    public function getPayment($payment_id){
        $user = auth()->user();
        $payment = $user->payments()->findOrFail($payment_id);
        $created_at = new \Carbon\Carbon($payment->created_at);
        $expired_at = $created_at->addHours(24);
        $now = \Carbon\Carbon::now();
        if($now->lessThan($expired_at)){
            $payment->remaining_time = $now->diffInMilliseconds($expired_at);
        }
        return $payment;
        
    }
    public function checkPayment(Request $request, $payment_id){
        $user = $request->user();
        $payment = $user->payments()->findOrFail($payment_id);
        $payment->load('paymentable','payment_vendor');
        // return $payment;
        $client = new GuzzleHttp\Client();
        $res = $client->get(env('MASTER_PAYMENT_URL')."/checkstatus/{$payment->master_payment_id}");
        $master_payment = json_decode($res->getBody());
        // jika status di master payment success, ubah jika payments.status
        $payment->status = $master_payment->status??'pending';
        $payment->save();
        return $payment;
        // dd($master_payment);

    }
    public function confirmPayment($payment_id, Request $request){
        try{
            $user = auth()->user();
            DB::beginTransaction();
            $payment = Payment::whereHasMorph('paymentable', \App\Models\User::class, function(Builder $query)use($user){
                $query->where('users.id', $user->id);
            })->findOrFail($payment_id);
            
            $payment->status = 'pending';
            $payment->save();
            
            DB::commit();
            // \App\Events\PaymentNew::dispatch($payment);
            return $payment;
            
        }catch (\PDOException $e) {
            DB::rollBack();
            return response($e->getMessage(), 500);
        }
    }
    public function createPayment(Request $request){
        $request->validate([
            'value'=>'required',
            'payment_vendor_id'=>'required'
        ]);
        $user = $request->user();
        $payment_vendor = \App\Models\PaymentVendor::findOrFail($request->payment_vendor_id);
        $stop = false;
        
        $client = new GuzzleHttp\Client();
        $json_data = ['value'=>$request->value,'service_code'=>$payment_vendor->service_code, 'account_number'=>$payment_vendor->account_number];
        $res = $client->post(env('MASTER_PAYMENT_URL').'/createpaymenttoaccountnumber',[
            'json'=> $json_data
        ]);
        $master_payment = json_decode($res->getBody());
        if(json_last_error() != JSON_ERROR_NONE){
            return response('Format JSON salah',422);
        }

        $res = $client->post(env('MASTER_PAYMENT_URL').'/todaytotalpaymentsbyaccountnumber',[
            'json'=> ['account_number'=>$payment_vendor->account_number,'service_code'=>$payment_vendor->service_code]
        ]);
        $today_total_payments = json_decode($res->getBody());

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
            $payment->note = 'Topup Balance';
            $payment->payment_vendor_id = $request->payment_vendor_id;
            $user->payments()->save($payment);
            
            DB::commit();
            // \App\Events\PaymentNew::dispatch($payment);
            $payment->note = json_encode(['today_total_payments'=>$today_total_payments]);
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
