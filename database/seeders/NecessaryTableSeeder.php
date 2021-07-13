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
        ], ['description'=>'Membeli paket soal oleh siswa']);

        Necessary::updateOrCreate([
            'name'=>'topup',
        ], ['description'=>'Pengisian saldo']);

        Necessary::updateOrCreate([
            'name'=>'bagi_keuntungan',
        ], ['description'=>'Bagi keuntungan hasil dari pembelian paket soal oleh siswa']);
    }
}
