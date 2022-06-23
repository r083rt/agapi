<?php

namespace App\Jobs;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
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

        $user = User::findOrFail(Auth::id());

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

        $snapToken = Veritrans_Snap::getSnapToken($payload);

        $this->response['snap_token'] = $snapToken;

        return response()->json($this->response);

    }
}
