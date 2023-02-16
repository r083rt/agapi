<?php

namespace App\Http\Controllers\API\v2\admin;

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

    public function paymentGrowth(){
        // ambil count payment dari awal sampai 2 bulan lalu
        $paymentsTill2MonthAgo = Payment::whereDate('created_at', '<', date('Y-m-d', strtotime('-2 month')))
            ->where('status', 'success')
            ->count();

        // ambil count payment dari awal sampai bulan lalu
        $paymentsTillLastMonth = Payment::whereDate('created_at', '<', date('Y-m-d', strtotime('-1 month')))
            ->where('status', 'success')
            ->count();

        // ambil count payment dari awal sampai bulan ini
        $paymentsNow = Payment::whereDate('created_at', '<', date('Y-m-d'))
            ->where('status', 'success')
            ->count();

        // selisih kenaikan 2 bulan lalu dengan bulan lalu
        $paymentsGrowthTillLastMonth = $paymentsTillLastMonth - $paymentsTill2MonthAgo;
        // selisih kenaikan bulan lalu dengan bulan ini
        $paymentsGrowthNow = $paymentsNow - $paymentsTillLastMonth;

        // percentage kenaikan 2 bulan lalu dengan bulan lalu
        $paymentsGrowthPercentageTillLastMonth = $paymentsGrowthTillLastMonth / $paymentsTill2MonthAgo * 100;
        // percentage kenaikan bulan lalu dengan bulan ini
        $paymentsGrowthPercentageNow = $paymentsGrowthNow / $paymentsTillLastMonth * 100;

        return response()->json([
            'paymentsTill2MonthAgo' => $paymentsTill2MonthAgo,
            'paymentsTillLastMonth' => $paymentsTillLastMonth,
            'paymentsNow' => $paymentsNow,
            'paymentsGrowthTillLastMonth' => $paymentsGrowthTillLastMonth,
            'paymentsGrowthNow' => $paymentsGrowthNow,
            'paymentsGrowthPercentageTillLastMonth' => $paymentsGrowthPercentageTillLastMonth,
            'paymentsGrowthPercentageNow' => $paymentsGrowthPercentageNow,
        ]);

    }
}
