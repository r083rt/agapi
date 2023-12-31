<?php

namespace App\Http\Controllers\API\v1;

use App\Helper\Midtrans;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Payment;
use App\Models\User;
// memanggil helper Midtrans
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kongres2022Controller extends Controller
{
    //
    protected $kongres_2022_id;
    protected $kongres_2022_price;

    public function __construct(Request $request)
    {
        $this->kongres_2022_id = setting('kta-app.kongres_2022_id');
        $this->kongres_2022_price = setting('kta-app.kongres_2022_price');
    }

    public function checkKongres2022Payment($userId)
    {
        $res = Payment::where('payment_type', 'App\Models\Event')
            ->where('payment_id', $this->kongres_2022_id)
            ->where('user_id', $userId)
            ->where('key', 'pendaftaran_kongres_tahun_2022')
            ->where('status', 'success')
            ->exists();
        return response()->json([
            "status" => $res,
            "message" => $res ? "User sudah melakukan pembayaran" : "User belum melakukan pembayaran",
        ]);
    }

    public function createKongres2022Payment(Request $request)
    {

        $request->validate([
            'user_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = User::findOrFail($value);
                    if ($user->user_activated_at == null) {
                        return $fail("User belum menjadi anggota");
                    }
                },
                function ($attribute, $value, $fail) {
                    $user = User::findOrFail($value);
                    $payment = $user->payments()->where('status', 'success')
                        ->where('key', 'pendaftaran_kongres_tahun_2022')
                        ->exists();
                    if ($payment) {
                        return $fail('User sudah melakukan pembayaran kongres');
                    }

                },
            ],
        ]);

        $user = User::findOrFail($request->user_id);

        $midtransId = "AD-$user->id-" . time();

        $payment = new Payment([
            'value' => $this->kongres_2022_price,
            'key' => "pendaftaran_kongres_tahun_2022",
            'type' => 'IN',
            'payment_type' => 'App\Models\Event',
            'payment_id' => $this->kongres_2022_id,
            'midtrans_id' => $midtransId,
        ]);

        $user->payments()->save($payment);

        $payload = [
            'transaction_details' => [
                'order_id' => $payment->midtrans_id,
                'gross_amount' => $payment->value,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        $paymentUrl = Midtrans::createTransaction($payload)->redirect_url;

        return response()->json([
            "status" => true,
            "message" => "Pembayaran berhasil",
            "payment_url" => $paymentUrl,
        ]);

    }

    public function getKongres2022SuratMandat($userId)
    {
        $file = File::where('file_id', $userId)
            ->where('file_type', 'App\Models\User')
            ->where('key', 'kongres_2022_surat_mandat')
            ->first();
        return response()->json([
            "status" => $file != null,
            "message" => $file != null ? "Surat mandat ditemukan" : "Surat mandat tidak ditemukan",
            "file" => $file,
        ]);
    }

    public function getKongres2022SuratTugas($userId)
    {
        $file = File::where('file_id', $userId)
            ->where('file_type', 'App\Models\User')
            ->where('key', 'kongres_2022_surat_tugas')
            ->first();
        return response()->json([
            "status" => $file != null,
            "message" => $file != null ? "Surat Tugas ditemukan" : "Surat Tugas tidak ditemukan",
            "file" => $file,
        ]);

    }

    public function storeKongres2022SuratMandat(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);
        $filename = $request->file('file')->getClientOriginalName();
        $filemimetype = $request->file('file')->getClientMimeType();
        $path = $request->file('file')->store('files/kongres_2022_surat_mandat');
        $file = new File();
        $file->file_type = "App\Models\User";
        $file->file_id = auth('api')->user()->id;
        $file->src = $path;
        $file->name = $filename;
        $file->type = $filemimetype;
        $file->key = 'kongres_2022_surat_mandat';
        $file->save();
        return response()->json($file);
    }

    public function storeKongres2022SuratTugas(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);
        $filename = $request->file('file')->getClientOriginalName();
        $filemimetype = $request->file('file')->getClientMimeType();
        $path = $request->file('file')->store('files/kongres_2022_surat_tugas');
        $file = new File();
        $file->file_type = "App\Models\User";
        $file->file_id = auth('api')->user()->id;
        $file->src = $path;
        $file->name = $filename;
        $file->type = $filemimetype;
        $file->key = 'kongres_2022_surat_tugas';
        $file->save();
        return response()->json($file);
    }

    public function getGuideLocation($eventId)
    {
        $file = File::where('file_id', $eventId)
            ->where('file_type', 'App\Models\Event')
            ->where('key', 'guide_location')
            ->first();

        return response()->json([
            "status" => $file != null,
            "message" => $file != null ? "Denah ditemukan" : "Denah tidak ditemukan",
            "file" => $file,
        ]);
    }

    public function getGuideBook($eventId)
    {
        $files = File::where('file_id', $eventId)
            ->where('file_type', 'App\Models\Event')
            ->where('key', 'guide_book')
            ->get();

        return response()->json($files);

    }

    public function checkPaymentStatus($userId)
    {
        $user = User::findOrFail($userId);

        $isPaid = Payment::where('payment_type', 'App\Models\Event')
            ->where('user_id', $userId)
            ->where('payment_id', $this->kongres_2022_id)
            ->where('status', 'success')
            ->where('key', 'pendaftaran_kongres_tahun_2022')
            ->whereDate('created_at', date('Y-m-d'))
            ->exists();

        if ($isPaid) {
            return response()->json([
                "status" => true,
                "message" => "User sudah melakukan pembayaran",
            ]);
        }

        $payments = Payment::where('payment_type', 'App\Models\Event')
            ->where('payment_id', $this->kongres_2022_id)
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->whereDate('created_at', date('Y-m-d'))
            ->where('key', 'pendaftaran_kongres_tahun_2022')
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
                // return response()->json($status);
                if ($status->transaction_status == 'settlement') {
                    $date = $payment->created_at;
                    $payment->status = 'success';
                    $payment->save();

                    // ----- pengecekan perpanjangan
                    // ----- masa perpanjangan yaitu tanggal aktif sampai 6 bulan
                    // 1. jika sudah lama expired set active dari tanggal bayar
                    // 2. jika belum expired maka tambah tanggal dari tanggal active
                    $expired_at = $user->user_activated_at->addMonths(6);
                    if ($expired_at < now()) {
                        $user->user_activated_at = date('Y-m-d H:i:s', strtotime($date));
                        $user->expired_at = date('Y-m-d H:i:s', strtotime($date . ' +6 months'));
                        $user->save();
                    } else {
                        $user->user_activated_at = date('Y-m-d H:i:s', strtotime($user->user_activated_at . ' +6 months'));
                        $user->expired_at = date('Y-m-d H:i:s', strtotime($user->expired_at . ' +6 months'));
                        $user->save();
                    }
                    return response()->json([
                        "status" => true,
                        "message" => "User sudah melakukan pembayaran dan telah ditambahkan masa aktif",
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

    public function getSetting()
    {
        $res = [
            "kongres_2022_price" => setting('kta-app.kongres_2022_price'),
            "kongres_2022_description" => setting('kta-app.kongres_2022_description'),
            "kongres_2022_link" => setting('kta-app.kongres_2022_link'),
            "kongres_2022_image" => setting('kta-app.kongres_2022_image'),
            "kongres_2022_id" => setting('kta-app.kongres_2022_id'),
        ];
        return response()->json($res);
    }

    public function getPaymentStatus($eventId, $userId)
    {
        $payment = Payment::where('payment_type', 'App\Models\Event')
            ->where('payment_id', $eventId)
            ->where('user_id', $userId)
            ->where('status', 'success')
            ->exists();
        return response()->json([
            "status" => $payment,
            "message" => $payment ? "User sudah melakukan pembayaran" : "User belum melakukan pembayaran",
        ]);
    }

    public function getSurat($eventId, $userId)
    {
        if ($eventId == 3642) {
            $file = File::where('file_id', $userId)
                ->where('file_type', 'App\Models\User')
                ->where('key', 'kongres_2022_surat_mandat')
                ->first();
            return response()->json([
                "status" => $file != null,
                "message" => $file != null ? "Surat Tugas ditemukan" : "Surat Tugas tidak ditemukan",
                "file" => $file,
            ]);
        } elseif ($eventId == 3643) {
            $file = File::where('file_id', $userId)
                ->where('file_type', 'App\Models\User')
                ->where('key', 'kongres_2022_surat_tugas')
                ->first();

            return response()->json([
                "status" => $file != null,
                "message" => $file != null ? "Surat Mandat ditemukan" : "Surat Mandat tidak ditemukan",
                "file" => $file,
            ]);

        }

        return response()->json([
            "status" => false,
            "message" => "Permintaan tidak valid",
        ]);
    }

    // mengambilan data anggota yang melakukan pembayaran kongres dengan id acara 3642, 3643 dan 3644
    public function getPaymentUsers()
    {
        $payments = Payment::
            join('users', 'users.id', '=', 'payments.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('provinces', 'provinces.id', '=', 'profiles.province_id')
            ->with('user')
            ->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->select(
                'provinces.id as id',
                DB::raw('count(payments.id) as total_payment'),
                'provinces.name as name'
            )
            ->groupBy('name')
            ->get();
        return response()->json($payments);
    }

    public function getPaymentUsersCount()
    {
        $payments = Payment::with('user')->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->count();
        return response()->json($payments);
    }

    public function getPaymentUserByProvince($provinceId)
    {
        $payments = Payment::join('users', 'payments.user_id', '=', 'users.id')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->join('cities', 'profiles.city_id', '=', 'cities.id')
            ->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->where('profiles.province_id', $provinceId)
            // ->with(['user.profile'=>function($query){
            //     $query->with(['province','city']);
            // }])
            // ->whereHas('user.profile',function($query){
            //     $query->where('city_id',3172);
            // })
            // ->select(
            //     "*",
            //     'payments.id as id_p'
            // )
            ->select(
                'cities.id as id',
                DB::raw('count(payments.id) as total_payment'),
                'cities.name as name'
            )
            ->groupBy('name')
            // ->select(
            //     'cities.id as id',
            //     DB::raw('count(payments.id) as total_payment'),
            //     'cities.name as name'
            // )
            ->get();
        return response()->json($payments);
    }

    public function getPaymentUserByProvinceCount($provinceId)
    {
        $payments = Payment::with('user')->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->whereHas('user.profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->count();
        return response()->json($payments);
    }

    public function getPaymentUserByCity($cityId)
    {
        $payments = Payment::with('user')->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->whereHas('user.profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->get();
        return response()->json($payments);
    }

    public function getPaymentUserByCityCount($cityId)
    {
        $payments = Payment::with('user')->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->whereHas('user.profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->count();
        return response()->json($payments);
    }

    public function getPaymentUserByDistrict($districtId)
    {
        $payments = Payment::with('user')->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->whereHas('user.profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })
            ->get();
        return response()->json($payments);
    }

    public function getPaymentUserByDistrictCount($districtId)
    {
        $payments = Payment::with('user')->where('payment_type', 'App\Models\Event')
            ->whereIn('payment_id', [3642, 3643, 3644])
            ->where('status', 'success')
            ->whereHas('user.profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })
            ->count();
        return response()->json($payments);
    }
}
