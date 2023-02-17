<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Helper\TapTalk;

class SubscribeReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'taptalk:send-subscribe-reminder';

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
        // users yang masa expired_at nya tinggal 7 hari lagi
        $users = User::has('profile')
            ->with('profile')
            ->where('expired_at', '>', now())
            ->where('expired_at', '<', now()->addDays(7))
            ->get();

        $count = $users->count();

        foreach ($users as $u => $user) {
            $percentage = round(($u + 1) / $count * 100, 2);

            try{
                // kirim message whatsapp via taptalk
                $taptalk = new TapTalk();
                $taptalk->sendMessage($user->profile->contact, "Halo {$user->name}, masa berlangganan kamu tinggal 7 hari lagi. Silahkan perpanjang berlangganan kamu melalui aplikasi KTA AGPAII DIGITAL sebelum tanggal {$user->expired_at->format('d-m-Y')}. Jika ada kendala, silahkan hubungi admin melalui aplikasi KTA AGPAII DIGITAL. Terima kasih.");

                $this->info("{$percentage}% ({$u}/{$count}) {$user->name} Telah dikirim pesan whatsapp ke nomer {$user->profile->contact}");

            } catch (\Exception $e) {
                $this->error("{$percentage}% ({$u}/{$count}) {$user->name} Gagal dikirim pesan whatsapp ke nomer {$user->profile->contact}");
            }

            // kirim email
            // $user->notify(new SubscribeReminderNotification());
        }

        return 0;
    }
}
