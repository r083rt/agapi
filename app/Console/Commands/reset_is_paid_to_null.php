<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class reset_is_paid_to_null extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset_is_paid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset is_paid di table assigment dan question_lists ke NULL';

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

        $confirm = $this->ask('Apakah Anda yakin? semua is_paid akan diubah ke NULL: [y/n]');
        if($confirm==='y' || $confirm==='Y'){
            echo DB::table('assigments')->update(['is_paid'=>NULL])."\n";
            echo DB::table('question_lists')->update(['is_paid'=>NULL]);
        }
        
        return 0;
    }
}
