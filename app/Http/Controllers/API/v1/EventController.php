<?php

namespace App\Http\Controllers\API\v1;

use App\Helper\Midtrans;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::with('users.profile', 'user.profile')->orderBy('start_at', 'desc')
        // ->whereDate('start_at',Carbon::today())
            ->paginate($request->show ?? 10);
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            function ($validator) { // validasi start_at
                $start_at = $validator->getData()['start_at'];
                $now = Carbon::now();
                if ($start_at < $now) {
                    $validator->errors()->add('start_at', 'Tanggal mulai tidak boleh lebih kecil dari tanggal sekarang');
                }
            },
        ]);
        $event = new Event;
        $event->fill($request->except(['start_at', 'end_at']));
        $event->user_id = $request->user()->id;
        $event->start_at = date('Y-m-d h:i:s', strtotime($request->start_at));
        $event->end_at = date('Y-m-d h:i:s', strtotime($request->end_at));
        $event->save();

        // $request->user()->guest_events()->sync($event, false);

        return response()->json($event->load('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::with([
            'users',
            'user',
            'partisipants',
            'creator',
            'registered_users',
            'attended_users',
        ])->findOrFail($id);
        return response()->json($event);
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
        $request->validate([
            'name' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->name = $request->name;
        if ($request->has('description')) {
            $event->description = $request->description;
        }
        $event->save();
        return response()->json($event);
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
        $event = Event::findOrfail($id);
        $event->delete();
        return response()->json($event);
    }

    public function get_event_years()
    {
        // return 'asd';
        $res = DB::table('events')
            ->select(
                DB::raw('YEAR(events.start_at) year'),
            )
            ->orderBy('year', 'desc')
            ->groupBy('year')
            ->get();
        return $res;
    }

    public function filter_event(Request $request)
    {
        // return response()->json($request->all());
        $month = strval($request->month);
        $year = strval($request->year['year']);
        $res = Event::whereMonth('start_at', $month)
            ->whereYear('start_at', $year)->paginate(5);

        return $res;
    }

    public function getEventById($id)
    {
        $event = Event::with('users.profile', 'user.profile', 'users.role', 'event_guests', 'registered_users', 'attended_users', 'guide_book', 'banner', 'guide_place')->findOrFail($id);
        return response()->json($event);
    }

    // user yang terdaftar kedalam adalah user yang sudah melakukan pembayaran ( jika acara berbayar )
    public function getRegisteredUsers($eventId)
    {
        $partisipants = User::with('profile', 'role', 'votable')
            ->withCount(['guest_events as is_attended' => function ($query) use ($eventId) {
                $query
                    ->where('event_id', $eventId);

            }])
            ->whereHas('payments', function ($query) use ($eventId) {
                $query
                    ->where('status', 'success')
                    ->where('payment_type', 'App\Models\Event')
                    ->where('payment_id', $eventId);
            })->paginate();
        return response()->json($partisipants);
    }

    public function searchRegisteredUsers($eventId, $key)
    {
        // return response()->json($key);
        $partisipants = User::with('profile', 'role', 'votable')
            ->withCount(['guest_events as is_attended' => function ($query) use ($eventId) {
                $query
                    ->where('event_id', $eventId);

            }])
            ->whereHas('payments', function ($query) use ($eventId) {
                $query
                    ->where('status', 'success')
                    ->where('payment_type', 'App\Models\Event')
                    ->where('payment_id', $eventId);
            })
            ->where(function ($query) use ($key) {
                $query->where('name', 'like', '%' . $key . '%')
                    ->orWhere('email', 'like', '%' . $key . '%')
                    ->orWhere('kta_id', 'like', '%' . $key . '%');
            })
            ->paginate();
        return response()->json($partisipants);
    }

    public function getPartisipants($eventId)
    {
        $partisipants = User::with('profile', 'role')
            ->whereHas('guest_events', function ($query) use ($eventId) {
                $query
                    ->where('event_id', $eventId);
            })->paginate();
        return response()->json($partisipants);
    }

    public function searchPartisipants($eventId, $keyword)
    {
        $partisipants = User::with('profile', 'role')
            ->whereHas('guest_events', function ($query) use ($eventId) {
                $query
                    ->where('event_id', $eventId);
            })
            ->where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('kta_id', 'like', '%' . $keyword . '%');
            })
            ->paginate();
        return response()->json($partisipants);
    }

    public function getRegisteredUsersCount($eventId)
    {
        $partisipants = User::with('profile', 'role')
            ->whereHas('payments', function ($query) use ($eventId) {
                $query
                    ->where('status', 'success')
                    ->where('payment_type', 'App\Models\Event')
                    ->where('payment_id', $eventId);
            })->count();
        return response()->json($partisipants);
    }

    public function getPartisipantsCount($eventId)
    {
        $partisipants = User::with('profile', 'role')
            ->whereHas('guest_events', function ($query) use ($eventId) {
                $query
                    ->where('event_id', $eventId);
            })->count();
        return response()->json($partisipants);
    }

    public function paymentUrl($eventId)
    {
        $event = Event::findOrFail($eventId);

        $user = User::findOrFail(auth()->user()->id);

        $key = "pembayaran_acara";

        $midtransId = "AD-$user->id-" . time();

        $data = new Payment([
            'payment_type' => 'App\Models\Event',
            'payment_id' => $event->id,
            'value' => $event->price,
            'key' => $key,
            'type' => 'IN',
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

    public function checkPaymentStatus($eventId)
    {
        $event = Event::findOrFail($eventId);
        $user = User::findOrFail(auth('api')->user()->id);

        $isPaid = Payment::where('payment_type', 'App\Models\Event')
            ->where('user_id', $user->id)
            ->where('payment_id', $event->id)
            ->where('status', 'success')
            ->exists();

        if ($isPaid) {
            return response()->json([
                "status" => true,
                "message" => "User sudah melakukan pembayaran",
            ]);
        }

        $payments = Payment::where('payment_type', 'App\Models\Event')
            ->where('payment_id', $event->id)
            ->where('user_id', $user->id)
            ->where('status', 'pending')
            ->get();

        if ($payments->count() < 1) {
            return response()->json([
                "status" => false,
                'data' => $payments->count(),
                "message" => "User belum melakukan pembayaran",
            ]);
        }

        foreach ($payments as $payment) {
            try {

                $status = Midtrans::status($payment->midtrans_id);

                if ($status->transaction_status == 'settlement') {
                    $date = $payment->created_at;
                    $payment->status = 'success';
                    $payment->save();

                    $this->kongresSpecialEffect($eventId, $user->id);

                    return response()->json([
                        "status" => true,
                        "message" => "Pembayaran berhasil",
                        "payment" => $payment,
                    ]);

                    break;
                }
            } catch (\Exception $e) {

            }
        }
        return response()->json([
            "status" => false,
            "message" => "User belum melakukan pembayaran",
        ]);
    }

    public function kongresSpecialEffect($eventId, $userId)
    {
        if ($eventId == 3642 || $eventId == 3643 || $eventId == 3644) {
            $user = User::findOrFail($userId);
            // ----- pengecekan perpanjangan
            // ----- masa perpanjangan yaitu tanggal aktif sampai 6 bulan
            // 1. jika sudah lama expired set active dari tanggal bayar
            // 2. jika belum expired maka tambah tanggal dari tanggal active
            $expired_at = $user->user_activated_at->addMonths(6);
            if ($expired_at < now()) {
                $user->user_activated_at = date('Y-m-d H:i:s');
                $user->expired_at = date('Y-m-d H:i:s', strtotime('+6 months'));
                $user->save();
            } else {
                $user->user_activated_at = date('Y-m-d H:i:s', strtotime($user->user_activated_at . ' +6 months'));
                $user->expired_at = date('Y-m-d H:i:s', strtotime($user->expired_at . ' +6 months'));
                $user->save();
            }
        }

    }

    public function getEventProfitSum($userId)
    {
        // penghasilan dari pembayaran yang masuk
        $valueIn = Payment::whereHas('event.creator', function ($query) use ($userId) {
            $query->where('id', $userId);
        })
            ->where('payment_type', 'App\Models\Event')
            ->where('key', 'pembayaran_acara')
            ->where('status', 'success')
            ->where('type', 'IN')
            ->sum('value');

        // pengeluaran dari pembayaran yang di keluarkan
        $valueOut = Payment::where('key', 'penarikan_saldo_acara')
            ->where('user_id', $userId)
            ->where('status', 'success')
            ->where('type', 'OUT')
            ->sum('value');

        $res = $valueIn - $valueOut;

        return response()->json($res);
    }

    public function getEventProfit($userId)
    {
        $res = Payment::join('users as buyer', 'buyer.id', '=', 'payments.user_id')
            ->join('events', 'events.id', '=', 'payments.payment_id')
            ->whereHas('event.creator', function ($query) use ($userId) {
                $query->where('id', $userId);
            })
            ->where('key', 'pembayaran_acara')
            ->where('payments.type', 'IN')
            ->where('payment_type', 'App\Models\Event')
            ->where('status', 'success')
            ->select(
                DB::raw('payments.id as id'),
                DB::raw('DATE_FORMAT(payments.created_at, "%Y-%m") as date'),
                DB::raw('year(payments.created_at) as year'),
                DB::raw('MONTHNAME(payments.created_at) as month'),
                DB::raw('buyer.name as buyer_name'),
                DB::raw('events.name as event_name'),
                'value'
            )
        // order by year month
            ->orderBy('date', 'asc')
            ->get();
        return response()->json($res);
    }

    public function getEventProtitDates($userId)
    {
        $res = Payment::whereHas('event.creator', function ($query) use ($userId) {
            $query->where('id', $userId);
        })
            ->where('payment_type', 'App\Models\Event')
            ->where('status', 'success')
            ->select(
                DB::raw('DATE_FORMAT(payments.created_at, "%Y-%m") as date'),
                DB::raw('year(payments.created_at) as year'),
                DB::raw('MONTHNAME(payments.created_at) as month'),
            )
            ->groupBy('date')
            ->get();
        return response()->json($res);

    }

    public function getWithdrawEventProfit($userId)
    {
        $res = DB::table('payments')->where('user_id', $userId)
            ->where('key', 'penarikan_saldo_acara')
            ->select(
                'id',
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as date'),
                DB::raw('year(created_at) as year'),
                DB::raw('MONTHNAME(created_at) as month'),
                'value',
                'status'
            )
            ->get();
        return response()->json($res);
    }

    public function getWithdrawEventProfitDates($userId)
    {
        $res = DB::table('payments')->where('user_id', $userId)
            ->where('key', 'penarikan_saldo_acara')
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as date'),
                DB::raw('year(created_at) as year'),
                DB::raw('MONTHNAME(created_at) as month'),
            )
            ->groupBy('date')
            ->get();
        return response()->json($res);
    }

    public function requestWithdrawEventProfit(Request $request)
    {
        $request->validate([
            'note' => 'required',
            'value' => 'required|numeric|min:1',
            // cek nilai penarikan harus lebih kecil dari saldo
            function ($validator) use ($request) {
                $user = User::findOrFail($request->user()->id);
                $balance = $this->getTotalIncome($user->id);
                if ($balance < $validator->getData()['value']) {
                    return response()->json([
                        "status" => false,
                        "message" => "Saldo tidak mencukupi",
                    ]);
                }
            },
        ]);

        $withdraw = new Payment([
            'note' => $request->note,
            'user_id' => $request->user()->id,
            'key' => 'penarikan_saldo_acara',
            'type' => 'OUT',
            'status' => 'pending',
            'value' => $request->value,
        ]);

        $withdraw->save();
        return response()->json($withdraw);
    }

    public function withdrawDetail($paymentId)
    {
        $res = Payment::findOrfail($paymentId);
        return response()->json($res);
    }

    public function writeExcel($keyvalues, $query, $title = "Report")
    {
        $spreadsheet = new Spreadsheet();
        //Specify the properties for this document
        $spreadsheet->getProperties()
            ->setTitle($title)
            ->setSubject('A PHPExcel example')
            ->setDescription('AGPAII Digital')
            ->setCreator('CV Ardata Media')
            ->setLastModifiedBy('CV Ardata Media');

        //style
        $colors = ['e9f7e9', 'd4c4ae'];
        $styleArray = ['fill' => [
            'fillType' => Fill::FILL_SOLID,
            'color' => ['rgb' => 'aed4ae'],
        ],

        ];

        //Adding data to the excel sheet
        $spreadsheet->setActiveSheetIndex(0);
        $now = \Carbon\Carbon::now()->timezone('Asia/Jakarta')->toDateTimeString();
        $end_col = chr(65 + (count($keyvalues) - 1));
        $spreadsheet->getActiveSheet()->setCellValue('A1', 'Data diambil pada ' . $now)->mergeCells('A1:' . $end_col . '1');

        $row = 2;
        $i = 0;
        foreach ($keyvalues as $key => $value) {
            $col = chr(65 + $i);
            $spreadsheet->getActiveSheet()
                ->setCellValue($col . $row, $value);

            $i++;
        }
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2:' . $end_col . '2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A2:' . $end_col . '2')->getFont()->setBold(true);

        $row = 3;
        foreach ($query as $key => $data) {
            $i = 0;
            foreach ($keyvalues as $key => $value) {
                $col = chr(65 + $i);
                $spreadsheet->getActiveSheet()
                    ->setCellValue($col . $row, $data->{$key});
                $i++;
            }
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $title . '.xlsx"');
        $writer->save('php://output');
    }

    public function registeredUserReportExcel($eventId)
    {
        $event = Event::findOrfail($eventId);

        $query = User::join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->whereHas('payments', function ($query) use ($eventId) {
                $query
                    ->where('status', 'success')
                    ->where('payment_type', 'App\Models\Event')
                    ->where('payment_id', $eventId);
            })
            ->select(
                DB::raw('users.name as name'),
                DB::raw('roles.display_name as role'),
                DB::raw('profiles.school_place as tempat_dinas'),
                DB::raw('users.kta_id as nomer_kta'),
            )
            ->get();

        return $this->writeExcel(['nomer_kta' => 'Nomer KTA', 'name' => 'Nama', 'role' => 'Sebagai', 'tempat_dinas' => 'Tempat dinas'], $query, "Report anggota terdaftar - $event->name");

    }

    public function attendedUserReportExcel($eventId)
    {
        $event = Event::findOrfail($eventId);

        $query = User::join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->whereHas('guest_events', function ($query) use ($eventId) {
                $query
                    ->where('event_id', $eventId);
            })
            ->select(
                DB::raw('users.name as name'),
                DB::raw('roles.display_name as role'),
                DB::raw('profiles.school_place as tempat_dinas'),
                DB::raw('users.kta_id as nomer_kta'),
            )
            ->get();

        return $this->writeExcel(['nomer_kta' => 'Nomer KTA', 'name' => 'Nama', 'role' => 'Sebagai', 'tempat_dinas' => 'Tempat dinas'], $query, "Report anggota absen - $event->name");

    }

}
