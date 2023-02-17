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
        // 7 hari dari sekarang
        $date = now()->addDays(7);

        // users yang masa expired_at nya tinggal 7 hari lagi
        $users = User::whereHas('profile', function ($query) {
                $query->where('contact', '!=', null);
            })
            ->with('profile')
            ->whereDate('expired_at', $date->format('Y-m-d'))
            ->get();

        return $this->info("{$users[0]->name} {$users[0]->expired_at}");
        // $users = User::has('profile')
        //     ->with('profile')
        //     ->where('email', 'zulham724@students.unnes.ac.id')
        //     ->get();

        $count = $users->count();

        foreach ($users as $u => $user) {
            $percentage = round(($u + 1) / $count * 100, 2);

            try {
                // kirim message whatsapp via taptalk
                $taptalk = new TapTalk();

                $phone_number = $this->phone_format($user->profile->contact);

                $date = date('d-m-Y', strtotime($user->expired_at));

                $message = "Assalamualaikum Bpk/Ibu {$user->name} \n\nSudah saatnya iuran 6 bulan AGPAII, yuk lakukan iuran melalui Aplikasi AGPAII anda sebelum tanggal {$date}. \n\nJika ada kendala, silahkan hubungi admin melalui aplikasi KTA AGPAII DIGITAL. \n\nTerima kasih.";

                $response = $taptalk->sendMessage($phone_number, $message);

                $this->info($response->getBody()->getContents());

                $this->info("{$percentage}% ({$u}/{$count}) Berhasil mengirim pesan whatsapp ke {$user->name} dengan nomer {$phone_number}");
            } catch (\Exception $e) {
                $this->error("{$percentage}% ({$u}/{$count}) {$user->name} Gagal dikirim pesan whatsapp ke nomer {$user->profile->contact}");
            }

            // kirim email
            // $user->notify(new SubscribeReminderNotification());
        }

        return 0;
    }

    public function phone_format($phone)
    {
        // buat dengan format +62
        $phone = str_replace(' ', '', $phone);
        $phone = str_replace('-', '', $phone);
        $phone = str_replace('(', '', $phone);
        $phone = str_replace(')', '', $phone);

        if (substr($phone, 0, 1) == '0') {
            $phone = substr($phone, 1);
        }

        if (substr($phone, 0, 2) == '62') {
            $phone = '+' . $phone;
        } else {
            $phone = '+62' . $phone;
        }

        return $phone;
    }
}
