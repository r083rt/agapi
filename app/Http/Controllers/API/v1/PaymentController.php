<?php

namespace App\Http\Controllers\API\v1;

use App\Helper\Midtrans;
use App\Http\Controllers\Controller;
use App\Jobs\ProcessHandlePayment;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Veritrans_Notification;

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

    /*
    Mengecek status dari midtrans
     */
    public function getStatus($userId)
    {
        $user = User::findOrFail($userId);

        if ($user->user_activated_at == null) {
            //bayar pendaftaran
            $user->load(['payments' => function ($query) {
                $query
                    ->orderBy('id', 'DESC')
                    ->where('value', setting('admin.member_price'))
                    ->whereDate('created_at', date('Y-m-d'))
                    ->first();
            }]);
        } else {
            //bayar perpanjangan
            $user->load(['payments' => function ($query) {
                $query->orderBy('id', 'DESC')
                    ->whereDate('created_at', date('Y-m-d'))
                    ->where('value', setting('admin.extend_member_period'))
                    ->first();
            }]);
        }
        return response()->json($user);

        foreach ($user->payments as $p => $payment) {
            # code...
            try {
                $status = Midtrans::status($payment->midtrans_id);
                // return response()->json($status);
                if ($status->transaction_status == 'settlement') {
                    $date = $payment->created_at;
                    $payment->status = 'success';
                    $payment->save();
                    $user->update([
                        'user_activated_at' => date('Y-m-d H:i:s', strtotime($date)),
                        'expired_at' => date('Y-m-d H:i:s', strtotime($date . ' + 6 months')),
                    ]);
                    $user->payment_success = $payment;
                    break;
                }
            } catch (\Exception $e) {

            }

        }
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = $request->user();

        if ($user->user_activated_at == null) {
            $payment_value = setting('admin.member_price');
            $payment_text = "Pembayaran Member KTA";
            $key = "pendaftaran";
        } else {
            $payment_value = setting('admin.extend_member_period');
            $payment_text = "Pembayaran Iuran Anggota Selama 6 Bulan";
            $key = "perpanjangan_anggota";
        }

        // generate unique Id untuk midtrans transaction
        $midtransId = "AD-$user->id-" . time();

        $data = new Payment([
            'value' => $payment_value,
            'key' => $key,
            'midtrans_id' => $midtransId,
        ]);

        $payment = $user->payments()->save($data);

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

        return response()->json([
            'snap_token' => $snapToken,
            'payment' => $payment,
        ]);
    }

    public function paymentUrl(Request $request)
    {
        $user = $request->user();

        if ($user->user_activated_at == null) {
            $payment_value = setting('admin.member_price');
            $payment_text = "Pembayaran Member KTA";
            $key = "pendaftaran";
        } else {
            $payment_value = setting('admin.extend_member_period');
            $payment_text = "Pembayaran Iuran Anggota Selama 6 Bulan";
            $key = "perpanjangan_anggota";
        }

        // generate unique Id untuk midtrans transaction
        $midtransId = "AD-$user->id-" . time();

        $data = new Payment([
            'value' => $payment_value,
            'key' => $key,
            'midtrans_id' => $midtransId,
        ]);
        $payment = $user->payments()->save($data);

        $payload = [
            'transaction_details' => [
                'order_id' => $midtransId,
                'gross_amount' => $payment->value,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];
        $paymentUrl = Midtrans::createTransaction($payload)->redirect_url;

        return response()->json([
            "payment_url" => $paymentUrl,
        ]);
    }

    public function quickPaymentUrl(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::findOrFail($request->user_id);

        if ($user->user_activated_at == null) {
            $payment_value = setting('admin.member_price');
            $payment_text = "Pembayaran Member KTA";
            $key = "pendaftaran";
        } else {
            $payment_value = setting('admin.extend_member_period');
            $payment_text = "Pembayaran Iuran Anggota Selama 6 Bulan";
            $key = "perpanjangan_anggota";
        }

        // generate unique Id untuk midtrans transaction
        $midtransId = "AD-$user->id-" . time();

        $data = new Payment([
            'value' => $payment_value,
            'key' => $key,
            'midtrans_id' => $midtransId,
        ]);

        $payment = $user->payments()->save($data);

        $payload = [
            'transaction_details' => [
                'order_id' => $midtransId,
                'gross_amount' => $payment->value,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        $paymentUrl = Midtrans::createTransaction($payload)->redirect_url;

        return response()->json([
            "payment_url" => $paymentUrl,
        ]);
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

    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();

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
        return;
    }

    public function notificationQueueHandler(Request $request)
    {
        ProcessHandlePayment::dispatch();
        return;
    }

    ///////////////////-------BEGIN-------------/////////////////////
    /*                Rieqy Muwachid Erysya                       */
    //Menampilkan detail pembayaran berdasarkan waktu dan daerah  //
    //Hanya menampilkan data, tidak ada pengolahan data          //
    public function getPaymentByMonthYear(Request $request, $month = null, $year = null)
    {
        //return "s";
        //DB::connection()->enableQueryLog();
        $threshold = $request->query('threshold');
        if (!empty($threshold)) {
            $threshold = intval($threshold);
        } else {
            $threshold = 65000;
        }

        if ($month == null || $year == null) {
            $db = DB::select("SELECT count(DISTINCT payment_id) as users_count,year(created_at) as `year`, month(created_at) as `month`,UNIX_TIMESTAMP(concat(year(created_at),'-',month(created_at),'-1')) as `timestamp`, concat(year(created_at),'-',month(created_at),'-1') as monthyear FROM `payments` where status='success' and payment_type='App\\\Models\\\User' and value='$threshold' group by monthyear order by timestamp desc");
            //return DB::getQueryLog();

            return $db;
        } else {
            //script dibawah ini menampilkan jumlah orang yg punya payment, meskipun 1 orang payment'nya ada banyak, tetap dihitung 1 data
            return \App\Models\Province::withCount(['users' => function ($query) use ($month, $year, $threshold) {
                $query->whereHas('payments', function ($query2) use ($month, $year, $threshold) {
                    $query2->where('status', '=', 'success')->where('value', '=', $threshold)->whereMonth('created_at', $month)->whereYear('created_at', $year);
                });
            }])->get();

            //script dibawah ini menampilkan jumlah payment, bukan orangnya
            // $res= DB::select("SELECT *,(SELECT count(*) from payments where status='success' and user_id in (SELECT user_id FROM profiles where province_id=provinces.id) and month(created_at)=:month and year(created_at)=:year) as users_count FROM `provinces`",['month'=>$month,'year'=>$year]);
            // return $res;
        }
    }
    public function getPaymentCityByMonthYear(Request $request, $province_id = null, $month = null, $year = null)
    {
        //return "s";
        $threshold = $request->query('threshold');
        if (!empty($threshold)) {
            $threshold = intval($threshold);
        } else {
            $threshold = 65000;
        }

        if ($month && $year && $province_id) {

            return \App\Models\City::withCount(['users' => function ($query) use ($month, $year, $threshold) {
                $query->whereHas('payments', function ($query2) use ($month, $year, $threshold) {
                    $query2->where('status', '=', 'success')->where('value', '=', $threshold)->whereMonth('created_at', $month)->whereYear('created_at', $year);
                });
            }])->where('province_id', '=', $province_id)->get();

        }
    }
    public function getPaymentCityUsersByMonthYear($city_id = null, $month = null, $year = null)
    {
        //return "s";
        if ($month && $year && $city_id) {
            return \App\Models\City::with(['users' => function ($query) use ($month, $year) {
                $query->whereHas('payments', function ($query2) use ($month, $year) {
                    $query2->where('status', '=', 'success')->where('value', '=', 65000)->whereMonth('created_at', $month)->whereYear('created_at', $year);
                })->where('user_activated_at', '!=', null)
                    ->whereIn('role_id', [2, 7, 9, 10, 11])
                //->with(['books','posts.files','events','guest_events'])
                    ->withCount(['books', 'events', 'guest_events', 'lesson_plans', 'question_lists', 'posts' => function ($query) {
                        $query->has('files');
                    }]);
            }])->find($city_id);
        }
    }
    ///////////////////-------END-------------////////////////////
    /*                Rieqy Muwachid Erysya                      */
    //Menampilkan detail pembayaran berdasarkan waktu dan daerah //
    public function getProvincePayment(Request $request)
    {
        $threshold = $request->query('threshold');
        if (!empty($threshold)) {
            $threshold = intval($threshold);
        } else {
            $threshold = 65000;
        }

        //jika memakai inner join, maka waktu eksekusi jauh lebih lama
        $db = DB::select("SELECT c.id,count(DISTINCT b.id) as users_count,c.name from payments a inner join users b on a.payment_id=b.id inner join provinces c on c.id=(select province_id from profiles where user_id=b.id limit 1) WHERE a.payment_type='App\\\Models\\\User' and a.status='success' and a.value=? GROUP by c.id", [$threshold]);

        return $db;
    }
    public function getCityPayment(Request $request)
    {
        $threshold = $request->query('threshold');
        $province_id = $request->query('province_id');
        if (!empty($threshold)) {
            $threshold = intval($threshold);
        } else {
            $threshold = 65000;
        }

        if (empty($province_id)) {
            return abort(404);
        }

        $province = \App\Models\Province::findOrFail($province_id);

        $db = DB::select("SELECT c.id,c.province_id as province_id,count(DISTINCT b.id) as users_count,c.name from payments a inner join users b on a.payment_id=b.id inner join cities c on c.id=(select city_id from profiles where user_id=b.id limit 1) WHERE a.payment_type='App\\\Models\\\User' and a.status='success' and a.value=? GROUP by c.id having province_id=? ", [$threshold, $province->id]);

        return $db;
    }

    public function history()
    {
        $transactions = \App\Models\Transaction::with('payment.necessary', 'bank_account_from', 'bank_account_to')->orderBy('id', 'desc')->whereHas('bank_account_to', function ($query) {
            $query->whereNull('bank_account_type');
        })->get();
        return $transactions;
    }

    public function historyDpw($province_id)
    {
        $province = \App\Models\Province::findOrFail($province_id);
        // return $province
        $transactions = \App\Models\Transaction::with('payment.necessary', 'bank_account_from', 'bank_account_to')->whereHas('bank_account_to', function ($query) use ($province) {
            $query->where('bank_account_type', 'App\\Models\\Province')->where('bank_account_id', $province->id);
        })->orderBy('id', 'desc')->get();
        return $transactions;
    }

    public function historyDpd($city_id)
    {
        $city = \App\Models\City::findOrFail($city_id);
        // return $province
        $transactions = \App\Models\Transaction::with('payment.necessary', 'bank_account_from', 'bank_account_to')->whereHas('bank_account_to', function ($query) use ($city) {
            $query->where('bank_account_type', 'App\\Models\\City')->where('bank_account_id', $city->id);
        })->orderBy('id', 'desc')->get();
        return $transactions;
    }

    public function paymenttransactiontotal()
    {
        $db = DB::select("select sum(a.value) as total_payment_out from payments a inner join transactions b on a.payment_id=b.id inner join bank_accounts c on c.id=b.bank_account_to_id WHERE a.type='OUT' and a.payment_type='App\\\Models\\\Transaction' and c.bank_account_type is null");
        return response()->json($db[0]);
    }

    public function paymenttransactiontotalDPW($province_id)
    {
        $province = \App\Models\Province::findOrFail($province_id);
        $db = DB::select("select if(sum(a.value),sum(a.value),0) as total_payment_out from payments a inner join transactions b on a.payment_id=b.id inner join bank_accounts c on c.id=b.bank_account_to_id WHERE a.type='OUT' and a.payment_type='App\\\Models\\\Transaction' and c.bank_account_type='App\\\Models\\\Province' and c.bank_account_id=?", [$province->id]);
        return response()->json($db[0]);
    }

    public function paymenttransactiontotalDPD($city_id)
    {
        $city = \App\Models\City::findOrFail($city_id);
        $db = DB::select("select if(sum(a.value),sum(a.value),0) as total_payment_out from payments a inner join transactions b on a.payment_id=b.id inner join bank_accounts c on c.id=b.bank_account_to_id WHERE a.type='OUT' and a.payment_type='App\\\Models\\\Transaction' and c.bank_account_type='App\\\Models\\\City' and c.bank_account_id=?", [$city->id]);
        return response()->json($db[0]);
    }

}
