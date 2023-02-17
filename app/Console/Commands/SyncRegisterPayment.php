<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Helper\Midtrans;

class SyncRegisterPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:sync-register-payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('user_activated_at', null)
            ->whereHas('payments', function ($query) {
                return $query->where('value', 35000)->where('midtrans_id', '!=', null);
            })
            ->with(['payments' => function ($query) {
                return $query->where('value', 35000)->where('midtrans_id', '!=', null);
            }])->get();

        $usersCount = $users->count();

        foreach ($users as $u => $user) {
            $percentage = round(($u + 1) / $usersCount * 100, 2);

            $paymentsCount = $user->payments->count();

            foreach ($user->payments as $p => $payment) {
                $midtrans = new Midtrans();
                try {
                    $status = $midtrans->status($payment->midtrans_id);

                    $this->info("{$p}/{$paymentsCount} => Pembayaran berstatus {$status->transaction_status}");

                    if ($status->transaction_status == 'settlement') {
                        $result = $payment->setSuccess();

                        $this->info("{$percentage}% ({$u}/{$usersCount}) {$user->email} => Pembayaran telah di konfirmasi");
                    }
                } catch (\Exception $e) {
                    $this->info("{$percentage}% {$user->email} => orderId => {$payment->midtrans_id} Pembayaran gagal atau tidak ditemukan");
                }
            }
        }

        return 0;
    }
}
