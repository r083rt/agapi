<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Necessary;
class NecessaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Necessary::updateOrCreate([
            'name'=>'transfer',
        ], ['description'=>'Mentransfer antar rekening']);

        Necessary::updateOrCreate([
            'name'=>'beli_soal',
        ], ['description'=>'Membeli paket soal']);

        Necessary::updateOrCreate([
            'name'=>'topup',
        ], ['description'=>'Pengisian saldo']);
    }
}
