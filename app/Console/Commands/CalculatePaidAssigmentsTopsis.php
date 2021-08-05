<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class CalculatePaidAssigmentsTopsis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculatepaidassigmentstopsis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hitung skor topsis pada semua paket soal berbayar';

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
        \App\Helper\AssigmentProcess::calculatePaidAssigmentTopsis(true);
        // print_r($ranking);

        return 0;

    }
}
