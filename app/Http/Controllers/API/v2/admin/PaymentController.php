<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Helper\Midtrans;
use App\Models\User;
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
        $payments = Payment::has('user.profile')->with('user.profile')->orderBy('created_at','desc');

        if(request()->query('user_id')) {
            $payments->where('user_id', request()->query('user_id'));
        }

        // if have search query
        if(request()->query('search')) {
            $payments
            ->whereHas('user', function($query) {
                $query->where('name', 'like', '%' . request()->query('search') . '%')
                ->orWhere('email', 'like', '%' . request()->query('search') . '%');
            })
            ->orWhere('midtrans_id', 'like', '%' . request()->query('search') . '%');
        }

        // if have status query
        if(request()->query('status')) {
            $payments->where('status', request()->query('status'));
        }

        // if have key query
        if(request()->query('key')) {
            $payments->where('key', request()->query('key'));
        }

        $result = $payments->paginate(request()->query('per_page'));

        return response()->json($result);
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

    public function paymentGrowth()
    {
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
            'paymentsGrowthPercentageTillLastMonth' => round($paymentsGrowthPercentageTillLastMonth, 2),
            'paymentsGrowthPercentageNow' => round($paymentsGrowthPercentageNow, 2),
        ]);
    }

    public function statistic($year, $month)
    {
        // buat array tanggal pada bulan ini
        $dates = [];
        for ($i = 1; $i <= date('t'); $i++) {
            $dates[] = date('Y-m-') . $i;
        }

        // ambil sum value payments yang key nya pendaftaran lalu di group berdasarkan tanggal
        $registerPayments = Payment::where('status', 'success')
            ->where('key', 'pendaftaran')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->selectRaw('sum(value) as value, DATE(created_at) as date')
            ->groupBy('date')
            ->get();

        // ambil sum value payments yang key nya perpanjangan_anggota lalu di group berdasarkan tanggal
        $subscribe = Payment::where('status', 'success')
            ->where('key', 'perpanjangan_anggota')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->selectRaw('sum(value) as value, DATE(created_at) as date')
            ->groupBy('date')
            ->get();

        $etcs = Payment::where('status', 'success')
            // where key nya bukan pendaftaran dan perpanjangan_anggota
            ->whereNotIn('key', ['pendaftaran', 'perpanjangan_anggota'])
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->selectRaw('sum(value) as value, DATE(created_at) as date')
            ->groupBy('date')
            ->get();

        // masukan data payments ke array dates dengan object pendaftaran
        foreach ($dates as $key => $date) {
            $dates[$key] = [
                'date' => $date,
                'pendaftaran' => 0,
                'perpanjangan' => 0,
                'etc' => 0
            ];
            foreach ($registerPayments as $registerPayment) {
                if ($registerPayment->date == $date) {
                    $dates[$key]['pendaftaran'] = $registerPayment->value;
                }
            }

            foreach ($subscribe as $sub) {
                if ($sub->date == $date) {
                    $dates[$key]['perpanjangan'] = $sub->value;
                }
            }

            foreach ($etcs as $etc) {
                if ($etc->date == $date) {
                    $dates[$key]['etc'] = $etc->value;
                }
            }
        }

        return response()->json($dates);
    }

    public function syncStatistic($year, $month)
    {
        $payments = Payment::where('status', 'pending')
            ->where('key', 'pendaftaran')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'DESC')
            ->get();

        $firstCount = Payment::where('status', 'pending')
            ->where('key', 'pendaftaran')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'DESC')
            ->count();

        foreach ($payments as $payment) {
            try{
                $status = Midtrans::status($payment->midtrans_id);
                // return response()->json($status);
                if ($status->transaction_status == 'settlement') {
                    $date = $payment->created_at;
                    $payment->status = 'success';
                    $payment->save();
                    $user = User::find($payment->user_id);
                    if ($user->user_activated_at == null) {
                        $user->update([
                            'user_activated_at' => date('Y-m-d H:i:s', strtotime($date)),
                            'expired_at' => date('Y-m-d H:i:s', strtotime($date . ' + 6 months')),
                        ]);
                    }
                }
            } catch(\Exception $e){
                // return response()->json($e->getMessage());
            }
        }

        $lastCount = Payment::where('status', '!=', 'success')
            ->where('key', 'pendaftaran')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'DESC')
            ->count();

        return response()->json([
            'message' => 'success',
            'updated' => $firstCount - $lastCount
        ]);
    }
}
