<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Veritrans_Snap;

class ProcessMakePayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $request;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        //
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        if (strtotime(Auth::user()->created_at) < strtotime('-6 months')) {
            // jika umur akunnya lebih dari 6 bulan akan dikenakan biaya perpanjangan
            $payment_value = setting('admin.extend_member_period');
            $payment_text = "Pembayaran Iuran Anggota Selama 6 Bulan";
        } else {
            // bula kurang dari 6 bulan akan dikenakan biaya daftar baru
            $payment_value = setting('admin.member_price');
            $payment_text = "Pembayaran Member KTA";
        }

        $data = new Payment(['value' => $payment_value]);
        $uniqueId = 1;
        try {
            $payment = Auth::user()->payment()->save($data);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                while (Payment::where('id', $uniqueId)->exists()) {
                    $uniqueId++;
                }
                $newdata = new Payment(['id' => $uniqueId, 'value' => $payment_value]);
                $payment = Auth::user()->payment()->save($newdata);
            }
        }
        $data->id = $payment->id;
        $data->update();

        $payload = [
            'transaction_details' => [
                'order_id'      => $data->id,
                'gross_amount'  => $payment->value,
            ],
            'customer_details' => [
                'first_name'    => Auth::user()->name,
                'email'         => Auth::user()->email
            ],
            'item_details' => [
                [
                    'id'       => $payment->id,
                    'price'    => $payment->value,
                    'quantity' => 1,
                    'name'     => ucwords(str_replace('_', ' ', $payment_text))
                ]
            ]
        ];

        do {
            try {
                $tryAgain = false;
                $snapToken = Veritrans_Snap::getSnapToken($payload);
                // $paymentUrl = Veritrans_Snap::createTransaction($payload)->redirect_url;
            } catch (\Exception $e) {
                $tryAgain = true;
                if ($e->getCode() == '400') {
                    $uniqueId++;
                    $data->id = $uniqueId;
                    $data->update();
                    $payload['transaction_details']['order_id'] = $data->id;
                    $snapToken = Veritrans_Snap::getSnapToken($payload);
                    // $paymentUrl = Veritrans_Snap::createTransaction($payload)->redirect_url;
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
}
