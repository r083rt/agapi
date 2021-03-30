<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessHandlePayment;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use Veritrans_Config;
use Veritrans_Notification;
use Veritrans_Snap;
use Veritrans_Transaction;

class PaymentController extends Controller
{
    protected $request;

    /**
     * Class constructor.
     *
     * @param \Illuminate\Http\Request $request User Request
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        // Set midtrans configuration
        //Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$serverKey = "Mid-server-Nm-f1lgAL6i3jYoxDBDBSQUJ";
        Veritrans_Config::$isProduction = true;
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
        //
    }
    public function getStatus($userId)
    {
        $user = User::findOrFail($userId);
        //bayar pendaftaran
        if ($user->user_activated_at == null) {
            $user->load(['payments' => function ($query) {
                $query->orderBy('id', 'DESC')->where('master_payment_id', null)->where('value', 35000);
            }]);
        } else {
            //bayar perpanjangan
            $user->load(['payments' => function ($query) {
                $query->orderBy('id', 'DESC')->where('master_payment_id', null)->where('value', 65000);
            }]);
        }
        foreach ($user->payments as $p => $payment) {
            # code...
            try {
                $status = Veritrans_Transaction::status($payment->id);
                // dd($status->transaction_status);
                if ($status->transaction_status == 'settlement') {
                    $date = $payment->created_at;
                    $payment->status = 'success';
                    $payment->save();
                    $user->update(['user_activated_at' => $date]);
                    $user->payment_success = $payment;
                    break;
                }
            } catch (\Exception $e) {

            }

        }

        //dd($user);
        // if($user){

        //     foreach ($user->payments as $p => $payment) {
        //         # code...
        //         $status = Veritrans_Transaction::status($payment->id);
        //         // dd($status->transaction_status);
        //         if($status->transaction_status == 'settlement'){
        //             $date = $payment->created_at;
        //             $payment->status = 'success';
        //             $payment->save();
        //             $user->update(['user_activated_at'=>$date]);
        //         break;
        //         }
        //     }
        // }
        return $user;
    }

    public function getPaymentReport($from, $to)
    {
        // -- Semua pembayaran beserta yang bayar beberapa kali untuk satu aktivasi jadi keitung
        // $results = Payment::with(['user.profile.province','user.profile.city','user.profile.district'])
        // ->where('status','success')
        // ->where('value',35000)
        // ->whereBetween('updated_at',[date($from),date($to)])
        // ->get();
        // -------------------------------------------------------------------------------------

        // -- Hitung yang melakukan aktivasi saja
        $users = User::with(['payments' => function ($query) use ($from, $to) {
            $query
                ->where('status', 'success')
                ->where('value', 35000)
                ->whereBetween('updated_at', [date($from), date($to)]);
        }, 'payments.user'])
            ->whereHas('payments', function ($query) use ($from, $to) {
                $query
                    ->where('status', 'success')
                    ->where('value', 35000)
                    ->whereBetween('updated_at', [date($from), date($to)]);
            })
            ->get();
        // --------------------------------------

        $results = collect([]);
        foreach ($users as $u => $user) {
            # code...
            $results->add($user->payments[0]);
        }
        return response()->json($results);
    }

    public function getPaymentReportByProvince($from, $to, $provinceId)
    {
        // $results = Payment::with(['user.profile.province','user.profile.city','user.profile.district'])
        // ->where('status','success')
        // ->where('value',35000)
        // ->whereBetween('updated_at',[date($from),date($to)])
        // ->whereHas('user.profile.province',function($query)use($provinceId){
        //     $query->where('id',$provinceId);
        // })
        // ->get();

        // -- Hitung yang melakukan aktivasi saja
        $users = User::with(['payments' => function ($query) use ($from, $to) {
            $query
                ->where('status', 'success')
                ->where('value', 35000)
                ->whereBetween('updated_at', [date($from), date($to)]);
        }, 'payments.user'])
            ->whereHas('payments', function ($query) use ($from, $to) {
                $query
                    ->where('status', 'success')
                    ->where('value', 35000)
                    ->whereBetween('updated_at', [date($from), date($to)]);
            })
            ->whereHas('profile.province', function ($query) use ($provinceId) {
                $query
                    ->where('id', $provinceId);
            })
            ->get();
        // --------------------------------------

        $results = collect([]);
        foreach ($users as $u => $user) {
            # code...
            $results->add($user->payments[0]);
        }

        return response()->json($results);
    }

    public function getPaymentReportByCity($from, $to, $cityId)
    {
        // $results = Payment::with(['user.profile.province','user.profile.city','user.profile.district'])
        // ->where('status','success')
        // ->where('value',35000)
        // ->whereBetween('updated_at',[date($from),date($to)])
        // ->whereHas('user.profile.city',function($query)use($cityId){
        //     $query->where('id',$cityId);
        // })
        // ->get();
        // -- Hitung yang melakukan aktivasi saja
        $users = User::with(['payments' => function ($query) use ($from, $to) {
            $query
                ->where('status', 'success')
                ->where('value', 35000)
                ->whereBetween('updated_at', [date($from), date($to)]);
        }, 'payments.user'])
            ->whereHas('payments', function ($query) use ($from, $to) {
                $query
                    ->where('status', 'success')
                    ->where('value', 35000)
                    ->whereBetween('updated_at', [date($from), date($to)]);
            })
            ->whereHas('profile.city', function ($query) use ($cityId) {
                $query->where('id', $cityId);
            })
            ->get();
        // --------------------------------------

        $results = collect([]);
        foreach ($users as $u => $user) {
            # code...
            $results->add($user->payments[0]);
        }
        return response()->json($results);
    }

    public function getPaymentReportForArdata()
    {
        // $payments = Payment::with('user')
        // ->where('status','success')
        // ->where('value',35000)
        // ->get();

        // $results = collect([]);
        // foreach ($payments as $p => $payment) {
        //     # code...
        //     // isi tanggal
        //     $date = date('F Y',strtotime($payment->updated_at));
        //     $object = new stdClass();
        //     $object->date = $date;
        //     $object->total = 0;
        //     $object->toPaid = 0;
        //     $object->toReceive = 0;
        //     $object->rest = 0;
        //     $object->payments = collect([]);
        //     $results->add($object);
        //     $results = $results->unique();
        // }

        // foreach ($payments as $p => $payment) {
        //     # code...
        //     // menjumlahkan yang harus dibayar dan mengisi pembayaran apa saja didalamnya
        //     $date = date('F Y',strtotime($payment->updated_at));
        //     $results->map(function($result)use($date,$payment){
        //         if($result->date == $date){
        //             // -- tambah 20000 jika  pembayarannya 35000, tambah 30000 jika pembayarannya 65000
        //             // $result->toPaid += $payment->value == 35000 ? 20000 : 30000;
        //             // $result->toReceive += $payment->value == 35000 ? 10000 : 30000;
        //             //---------------------------------------------------------------------------------

        //             // -- sementara untuk hanya 35000
        //             $result->toPaid += 20000;
        //             $result->toReceive += 10000;
        //             $result->rest += 5000;
        //             //--------------------------------
        //             $result->total += $payment->value;
        //             $result->payments->add($payment);
        //             return $result;
        //         }
        //     });
        // }

        // -- Hitung yang melakukan aktivasi saja
        $users = User::with(['payments' => function ($query) {
            $query
                ->where('status', 'success')
                ->where('value', 35000);
        }, 'payments.user'])
            ->whereHas('payments', function ($query) {
                $query
                    ->where('status', 'success')
                    ->where('value', 35000);
            })
            ->get();
        // --------------------------------------

        $results = collect([]);
        foreach ($users as $u => $user) {
            # code...
            // isi tanggal
            $date = date('F Y', strtotime($user->payments[0]->updated_at));
            $object = new stdClass();
            $object->date = $date;
            $object->total = 0;
            $object->toPaid = 0;
            $object->toReceive = 0;
            $object->rest = 0;
            $object->payments = collect([]);
            $results->add($object);
            $results = $results->unique();
        }

        foreach ($users as $u => $user) {
            # code...
            // menjumlahkan yang harus dibayar dan mengisi pembayaran apa saja didalamnya
            $date = date('F Y', strtotime($user->payments[0]->updated_at));
            $results->map(function ($result) use ($date, $user) {
                if ($result->date == $date) {
                    // -- tambah 20000 jika  pembayarannya 35000, tambah 30000 jika pembayarannya 65000
                    // $result->toPaid += $payment->value == 35000 ? 20000 : 30000;
                    // $result->toReceive += $payment->value == 35000 ? 10000 : 30000;
                    //---------------------------------------------------------------------------------

                    // -- sementara untuk hanya 35000
                    $result->toPaid += 20000;
                    $result->toReceive += 10000;
                    $result->rest += 5000;
                    //--------------------------------
                    $result->total += $user->payments[0]->value;
                    $result->payments->add($user->payments[0]);
                    return $result;
                }
            });
        }

        return response()->json($results);
    }

    public function getPaymentReportForDpp()
    {
        // $payments = Payment::with('user')
        // ->where('status','success')
        // ->where('value',35000)
        // ->get();

        // -- Hitung yang melakukan aktivasi saja
        $users = User::with(['payments' => function ($query) {
            $query
                ->where('status', 'success')
                ->where('value', 35000);
        }, 'payments.user'])
            ->whereHas('payments', function ($query) {
                $query
                    ->where('status', 'success')
                    ->where('value', 35000);
            })
            ->get();
        // --------------------------------------

        $results = collect([]);
        foreach ($users as $u => $user) {
            # code...
            // isi tanggal
            $date = date('F Y', strtotime($user->payments[0]->updated_at));
            $object = new stdClass();
            $object->date = $date;
            $object->toPaid = 0;
            $object->payments = collect([]);
            $results->add($object);
            $results = $results->unique();
        }

        foreach ($users as $u => $user) {
            # code...
            // menjumlahkan yang harus dibayar dan mengisi pembayaran apa saja didalamnya
            $date = date('F Y', strtotime($user->payments[0]->updated_at));
            $results->map(function ($result) use ($date, $user) {
                if ($result->date == $date) {
                    // -- tambah 20000 jika  pembayarannya 35000, tambah 30000 jika pembayarannya 65000
                    // $result->toPaid += $payment->value == 35000 ? 4000 : 8000;
                    //---------------------------------------------------------------------------------

                    // -- sementara untuk hanya 35000
                    $result->toPaid += 4000;
                    //-------------------------------
                    $result->payments->add($user->payments[0]);
                    return $result;
                }
            });
        }

        return response()->json($results);
    }

    public function getPaymentReportForProvince($provinceId)
    {
        // $payments = Payment::with('user')
        // ->where('status','success')
        // ->where('value',35000)
        // ->whereHas('user.profile.province',function($query)use($provinceId){
        //     $query->where('id',$provinceId);
        // })
        // ->get();

        // $results = collect([]);
        // foreach ($payments as $p => $payment) {
        //     # code...
        //     // isi tanggal
        //     $date = date('F Y',strtotime($payment->updated_at));
        //     $object = new stdClass();
        //     $object->date = $date;
        //     $object->toPaid = 0;
        //     $object->payments = collect([]);
        //     $results->add($object);
        //     $results = $results->unique();
        // }

        // foreach ($payments as $p => $payment) {
        //     # code...
        //     // menjumlahkan yang harus dibayar dan mengisi pembayaran apa saja didalamnya
        //     $date = date('F Y',strtotime($payment->updated_at));
        //     $results->map(function($result)use($date,$payment){
        //         if($result->date == $date){
        //             // -- tambah 20000 jika  pembayarannya 35000, tambah 30000 jika pembayarannya 65000
        //             // $result->toPaid += $payment->value == 35000 ? 4000 : 8000;
        //             //---------------------------------------------------------------------------------

        //             // -- sementara untuk hanya 35000
        //             $result->toPaid += 6000;
        //             //-------------------------------
        //             $result->payments->add($payment);
        //             return $result;
        //         }
        //     });
        // }

        // -- Hitung yang melakukan aktivasi saja
        $users = User::with(['payments' => function ($query) {
            $query
                ->where('status', 'success')
                ->where('value', 35000);
        }, 'payments.user'])
            ->whereHas('payments', function ($query) {
                $query
                    ->where('status', 'success')
                    ->where('value', 35000);
            })
            ->whereHas('profile.province', function ($query) use ($provinceId) {
                $query->where('id', $provinceId);
            })
            ->get();
        // --------------------------------------

        $results = collect([]);
        foreach ($users as $u => $user) {
            # code...
            // isi tanggal
            $date = date('F Y', strtotime($user->payments[0]->updated_at));
            $object = new stdClass();
            $object->date = $date;
            $object->toPaid = 0;
            $object->payments = collect([]);
            $results->add($object);
            $results = $results->unique();
        }

        foreach ($users as $u => $user) {
            # code...
            // menjumlahkan yang harus dibayar dan mengisi pembayaran apa saja didalamnya
            $date = date('F Y', strtotime($user->payments[0]->updated_at));
            $results->map(function ($result) use ($date, $user) {
                if ($result->date == $date) {
                    // -- tambah 20000 jika  pembayarannya 35000, tambah 30000 jika pembayarannya 65000
                    // $result->toPaid += $payment->value == 35000 ? 4000 : 8000;
                    //---------------------------------------------------------------------------------

                    // -- sementara untuk hanya 35000
                    $result->toPaid += 6000;
                    //-------------------------------
                    $result->payments->add($user->payments[0]);
                    return $result;
                }
            });
        }

        return response()->json($results);
    }

    public function getPaymentReportForCity($cityId)
    {
        // $payments = Payment::with('user')
        // ->where('status','success')
        // ->where('value',35000)
        // ->whereHas('user.profile.city',function($query)use($cityId){
        //     $query->where('id',$cityId);
        // })
        // ->get();

        // -- Hitung yang melakukan aktivasi saja
        $users = User::with(['payments' => function ($query) {
            $query
                ->where('status', 'success')
                ->where('value', 35000);
        }, 'payments.user'])
            ->whereHas('payments', function ($query) {
                $query
                    ->where('status', 'success')
                    ->where('value', 35000);
            })
            ->whereHas('profile.city', function ($query) use ($cityId) {
                $query->where('id', $cityId);
            })
            ->get();
        // --------------------------------------

        $results = collect([]);
        foreach ($users as $u => $user) {
            # code...
            // isi tanggal
            $date = date('F Y', strtotime($user->payments[0]->updated_at));
            $object = new stdClass();
            $object->date = $date;
            $object->toPaid = 0;
            $object->payments = collect([]);
            $results->add($object);
            $results = $results->unique();
        }

        foreach ($users as $u => $user) {
            # code...
            // menjumlahkan yang harus dibayar dan mengisi pembayaran apa saja didalamnya
            $date = date('F Y', strtotime($user->payments[0]->updated_at));
            $results->map(function ($result) use ($date, $user) {
                if ($result->date == $date) {
                    // -- tambah 20000 jika  pembayarannya 35000, tambah 30000 jika pembayarannya 65000
                    // $result->toPaid += $payment->value == 35000 ? 4000 : 8000;
                    //---------------------------------------------------------------------------------

                    // -- sementara untuk hanya 35000
                    $result->toPaid += 10000;
                    //-------------------------------
                    $result->payments->add($user->payments[0]);
                    return $result;
                }
            });
        }

        return response()->json($results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (strtotime($request->user()->created_at) < strtotime('-6 months')) {
        //     // jika umur akunnya lebih dari 6 bulan akan dikenakan biaya perpanjangan
        //     $payment_value = setting('admin.extend_member_period');
        //     $payment_text = "Pembayaran Iuran Anggota Selama 6 Bulan";
        // } else {
        //     // bula kurang dari 6 bulan akan dikenakan biaya daftar baru
        //     $payment_value = setting('admin.member_price');
        //     $payment_text = "Pembayaran Member KTA";
        // }

        if ($request->user()->user_activated_at == null) {
            $payment_value = setting('admin.member_price');
            $payment_text = "Pembayaran Member KTA";
        } else {
            $payment_value = setting('admin.extend_member_period');
            $payment_text = "Pembayaran Iuran Anggota Selama 6 Bulan";
        }

        $data = new Payment(['value' => $payment_value]);
        $uniqueId = 1;
        try {
            $payment = $request->user()->payment()->save($data);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                while (Payment::where('id', $uniqueId)->exists()) {
                    $uniqueId++;
                }
                $newdata = new Payment(['id' => $uniqueId, 'value' => $payment_value]);
                $payment = $request->user()->payment()->save($newdata);
            }
        }
        $data->id = $payment->id;
        $data->update();

        $payload = [
            'transaction_details' => [
                'order_id' => $data->id,
                'gross_amount' => $payment->value,
            ],
            'customer_details' => [
                'first_name' => $request->user()->name,
                'email' => $request->user()->email,
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

        do {
            try {
                $tryAgain = false;
                $snapToken = Veritrans_Snap::getSnapToken($payload);
                // $paymentUrl = Veritrans_Snap::createTransaction($payload)->redirect_url;
            } catch (\Exception $e) {
                $tryAgain = true;
                // dd($e->getCode());
                if ($e->getCode() == '400') {
                    $uniqueId++;
                    $data->id = $uniqueId;
                    $data->update();
                    $payload['transaction_details']['order_id'] = $data->id;
                    $snapToken = Veritrans_Snap::getSnapToken($payload);
                    // $paymentUrl = Veritrans_Snap::createTransaction($payload)->redirect_url;
                } else {
                    break;
                }
            }
        } while ($tryAgain);

        $payment->snap_token = $snapToken;
        $payment->update();

        // Beri response snap token
        $this->response['snap_token'] = $snapToken;
        // $this->response['payment_url'] = $paymentUrl;

        return response()->json($this->response);
    }

    public function paymentUrl(Request $request)
    {

        if ($request->user()->user_activated_at == null) {
            $payment_value = setting('admin.member_price');
            $payment_text = "Pembayaran Member KTA";
        } else {
            $payment_value = setting('admin.extend_member_period');
            $payment_text = "Pembayaran Iuran Anggota Selama 6 Bulan";
        }

        $data = new Payment(['value' => $payment_value]);
        $uniqueId = 1;
        try {
            $payment = $request->user()->payment()->save($data);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                while (Payment::where('id', $uniqueId)->exists()) {
                    $uniqueId++;
                }
                $newdata = new Payment(['id' => $uniqueId, 'value' => $payment_value]);
                $payment = $request->user()->payment()->save($newdata);
            }
        }
        $data->id = $payment->id;
        $data->update();

        $payload = [
            'transaction_details' => [
                'order_id' => $data->id,
                'gross_amount' => $payment->value,
            ],
            'customer_details' => [
                'first_name' => $request->user()->name,
                'email' => $request->user()->email,
            ],
        ];
        //return $payload;
        //dd(Veritrans_Snap::createTransaction($payload)->redirect_url);
        do {
            try {
                $tryAgain = false;
                $paymentUrl = Veritrans_Snap::createTransaction($payload)->redirect_url;
            } catch (\Exception $e) {
                $tryAgain = true;
                //  dd($e->getCode();
                if ($e->getCode() == '400') {
                    $uniqueId++;
                    $data->id = $uniqueId;
                    $data->update();
                    $payload['transaction_details']['order_id'] = $data->id;
                    $paymentUrl = Veritrans_Snap::createTransaction($payload)->redirect_url;
                } else {
                    break;
                }
            }
        } while ($tryAgain);

        $payment->update();

        $this->response['payment_url'] = $paymentUrl;

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

    public function test($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->setSuccess();

        return response()->json($payment);
    }

    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraud = $notif->fraud_status;
        $payment = Payment::findOrFail($orderId);

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
    public function transfer(Request $request)
    {

        //return $request;
        if (empty($request->from) || empty($request->to)) {
            return response()->json(['error' => 'Rekening sumber dan Rekening tujuan tidak boleh kosong']);
        }
        $from = \App\Models\BankAccount::findOrFail($request->from['id']);
        $to = \App\Models\BankAccount::findOrFail($request->to['id']);

        $transaction = new \App\Models\Transaction;
        $transaction->bank_account_from_id = $from->id;
        $transaction->bank_account_to_id = $to->id;

        $necessary = \App\Models\Necessary::where('name', 'transfer')->first();
        if (!$necessary) {
            return response()->json(['error' => 'Necessary tidak ada']);
        }

        $transaction->description = $from->name . ' ' . $necessary->name . ' ke ' . $to->name . ' sebesar ' . $request->transfer_value;
        $transaction->save();

        $payment = new Payment;
        $payment->necessary_id = $necessary->id;
        $payment->type = 'OUT';
        $payment->value = intval($request->transfer_value);
        $transaction->payment()->save($payment);
        return $transaction->load('payment');
        //$payment->status='pend
    }
    public function transferDpw(Request $request)
    {

        //return $request;
        if (empty($request->from) || empty($request->to)) {
            return response()->json(['error' => 'Rekening sumber dan Rekening tujuan tidak boleh kosong']);
        }
        $from = \App\Models\BankAccount::findOrFail($request->from['id']);
        $to = \App\Models\BankAccount::findOrFail($request->to['id']);

        $transaction = new \App\Models\Transaction;
        $transaction->bank_account_from_id = $from->id;
        $transaction->bank_account_to_id = $to->id;

        $necessary = \App\Models\Necessary::where('name', 'transfer')->first();
        if (!$necessary) {
            return response()->json(['error' => 'Necessary tidak ada']);
        }

        $transaction->description = $from->name . ' ' . $necessary->name . ' ke ' . $to->name . ' sebesar ' . $request->transfer_value;
        $transaction->save();

        $payment = new Payment;
        $payment->necessary_id = $necessary->id;
        $payment->type = 'OUT';
        $payment->value = intval($request->transfer_value);
        $transaction->payment()->save($payment);
        return $transaction->load('payment');
        //$payment->status='pend
    }
    public function transferDpd(Request $request)
    {

        //return $request;
        if (empty($request->from) || empty($request->to)) {
            return response()->json(['error' => 'Rekening sumber dan Rekening tujuan tidak boleh kosong']);
        }
        $from = \App\Models\BankAccount::findOrFail($request->from['id']);
        $to = \App\Models\BankAccount::findOrFail($request->to['id']);

        $transaction = new \App\Models\Transaction;
        $transaction->bank_account_from_id = $from->id;
        $transaction->bank_account_to_id = $to->id;

        $necessary = \App\Models\Necessary::where('name', 'transfer')->first();
        if (!$necessary) {
            return response()->json(['error' => 'Necessary tidak ada']);
        }

        $transaction->description = $from->name . ' ' . $necessary->name . ' ke ' . $to->name . ' sebesar ' . $request->transfer_value;
        $transaction->save();

        $payment = new Payment;
        $payment->necessary_id = $necessary->id;
        $payment->type = 'OUT';
        $payment->value = intval($request->transfer_value);
        $transaction->payment()->save($payment);
        return $transaction->load('payment');
        //$payment->status='pend
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

    public function makeUniquePayment(Request $request)
    {
        if ($request->user()->user_activated_at == null) {
            $payment_value = setting('admin.member_price');
            $payment_text = "Pembayaran Member KTA";
        } else {
            $payment_value = setting('admin.extend_member_period');
            $payment_text = "Pembayaran Iuran Anggota Selama 6 Bulan";
        }

        $try = true;
        do {
            # code...
            $client = new Client();
            $res = $client->post('http://phpstack-530371-1844729.cloudwaysapps.com/createpayment', [
                'json' => [
                    'value' => $payment_value,
                    'payment_vendor' => $request->payment_vendor,
                ],
            ]);
            $data = json_decode($res->getBody(), true);

            try {
                //code...
                $data = new Payment(['payment_vendor_id' => $request->payment_vendor, 'master_payment_id' => $data['id'], 'value' => $data['value']]);
                $store = $request->user()->payment()->save($data);
                if ($store) {
                    $try = false;
                }

            } catch (\Throwable $th) {
                //throw $th;
                $try = true;
            }
        } while ($try);

        return response()->json($store->load('payment_vendor'));
    }

    public function confirmUniquePayment(Request $request)
    {
        $items = Payment::where('master_payment_id', '!=', null)->has('payment_vendor')->whereDate('created_at', Carbon::today())->whereHas('user', function ($query) use ($request) {
            $query->where('id', $request->user()->id);
        })->with('payment_vendor')->get();
        // $items[2]->value = 10000;

        // return response()->json($items);
        $paid = false;
        foreach ($items as $item) {
            $data = array(
                "search" => array(
                    // "date" => array(
                    //     "from" => date("Y-m-d") . " 00:00:00",
                    //     "to" => date("Y-m-d") . " 23:59:59",
                    // ),
                    "service_code" => $item->payment_vendor->service_code,
                    "account_number" => $item->payment_vendor->account_number,
                    "amount" => $item->value,
                ),
            );

            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => "https://api.cekmutasi.co.id/v1/bank/search",
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query($data),
                CURLOPT_HTTPHEADER => ["Api-Key: 69b336a06dc19b4a50f73212bf629978605c40613f6c4", "Accept: application/json"], // tanpa tanda kurung
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            ));
            $result = curl_exec($ch);
            $result = json_decode($result, true);
            curl_close($ch);

            if (count($result['response'])) {
                $payment = Payment::whereDate('created_at', Carbon::today())->where('value', (int) $result['response'][0]['amount'])->first();
                $payment->setSuccess();
            }

            if (count($result['response'])) {
                $paid = true;
            }

        }

        if ($paid) {
            $user = User::find($request->user()->id);
            $user->payment_success = $payment;
            return $user;
        } else {
            return abort(404, 'Belum ada yang dibayarkan');
        }
    }

    public function confirmOvoPayment()
    {
        $data = array(
            "search" => array(
                // "date" => array(
                //     "from" => date("Y-m-d") . " 00:00:00",
                //     "to" => date("Y-m-d") . " 23:59:59",
                // ),
                "account_number" => "089682169754",
                "amount" => "200000.00",
            ),
        );

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => "https://api.cekmutasi.co.id/v1/ovo/search",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER => ["Api-Key: 69b336a06dc19b4a50f73212bf629978605c40613f6c4", "Accept: application/json"], // tanpa tanda kurung
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
        ));
        $result = curl_exec($ch);
        $result = json_decode($result, true);
        curl_close($ch);
        return response()->json($result);
    }
}
