<?php

namespace App\Http\Controllers\API\v1;

use App\Helper\Midtrans;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Payment;
use App\Models\User;
// memanggil helper Midtrans
use Illuminate\Http\Request;

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
            'user_id' => 'required',
            function ($validator) { // validasi user_id
                $user = User::findOrFail($validator->getData()['user_id']);
                if ($user->user_activated_at == null) {
                    $validator->errors()->add('user_id', 'User belum menjadi anggota');
                }
            },
            function ($validator) { // pengecekan user pernah melakukan pembayaran kongres
                $user = User::findOrFail($validator->getData()['user_id']);
                $payment = $user->where('status', 'success')
                    ->where('key', 'pendaftaran_kongres_tahun_2022')
                    ->exists();
                if ($payment) {
                    $validator->errors()->add('user_id', 'User sudah melakukan pembayaran kongres');
                }
            },
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
            ->where('key', 'kongres_2022_surat_mandat')
            ->first();
        return response()->json($file);
    }

    public function getKongres2022SuratTugas($userId)
    {
        $file = File::where('file_id', $userId)
            ->where('key', 'kongres_2022_surat_tugas')
            ->first();
        return response()->json($file);
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
}
