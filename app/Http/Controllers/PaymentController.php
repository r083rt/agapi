<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use App\Models\Payment;

class PaymentController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        // if($request->user()->payment()->exists()){
        //     return abort(403,'Anda sudah melakukan pembayaran');
        // }
        $data = new Payment(['value'=>setting('admin.member_price')]);
        $payment = $request->user()->payment()->save($data);
        $data->id = '1212'+$payment->id;
        $data->update();

        $payload = [
            'transaction_details' => [
                'order_id'      => $data->id,
                'gross_amount'  => $payment->value,
            ],
            'customer_details' => [
                'first_name'    => $request->user()->name,
                'email'         => $request->user()->email
            ],
            'item_details' => [
                [
                    'id'       => $payment->id,
                    'price'    => $payment->value,
                    'quantity' => 1,
                    'name'     => ucwords(str_replace('_', ' ', 'Pembayaran Member KTA'))
                ]
            ]
        ];

        $snapToken = Veritrans_Snap::getSnapToken($payload);
        $payment->snap_token = $snapToken;
        $payment->update();

        // Beri response snap token
        $this->response['snap_token'] = $snapToken;

        return response()->json($this->response);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

    public function report(){
        return view('pages.payment.report');
    }

    public function test($paymentId){
        $payment = Payment::findOrFail($paymentId);
        $payment->setSuccess();

        return response()->json($payment);
    }

    public function perpanjangcepat(){
        return view('pages.payment.perpanjangcepat');
    }
}
