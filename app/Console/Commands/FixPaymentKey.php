<?php

namespace App\Console\Commands;

use App\Models\Payment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixPaymentKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:fix-key';

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
        //
        // buat query untuk mengubah key menjadi pendaftaran jika value 35000 dan menjadi perpanjangan_anggota jika value 65000 where key nya null
        $query = Payment::where('key', null)
            ->where(function ($query) {
                $query->where('value', 35000)
                    ->orWhere('value', 65000);
            })
            ->update([
                'key' => DB::raw('CASE WHEN value = 35000 THEN "pendaftaran" ELSE "perpanjangan_anggota" END'),
            ]);
        return 0;
    }
}
