<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\PaymentVendor;
use Illuminate\Http\Request;

class PaymentVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = PaymentVendor::get();
        return response()->json($res);
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
     * @param  \App\Models\PaymentVendor  $paymentVendor
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentVendor $paymentVendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentVendor  $paymentVendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentVendor $paymentVendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentVendor  $paymentVendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentVendor $paymentVendor)
    {
        //
    }
}
