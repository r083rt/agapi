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

        Necessary::updateOrCreate([
            'name'=>'bagi_ardata',
        ], ['description'=>'Bagi Hasil Pembelian Paket Soal ke Ardata']);

        Necessary::updateOrCreate([
            'name'=>'bagi_dpp',
        ], ['description'=>'Bagi Hasil Pembelian Paket Soal ke DPP']);

        Necessary::updateOrCreate([
            'name'=>'bagi_guru_butir_soal',
        ], ['description'=>'Bagi Hasil Pembelian Paket Soal ke Guru Pemilik Butir Soal']);

        Necessary::updateOrCreate([
            'name'=>'bagi_guru_paket_soal',
        ], ['description'=>'Bagi Hasil Pembelian Paket Soal ke Guru Pemilik Paket Soal']);

        Necessary::updateOrCreate([
            'name'=>'dana_simpan',
        ], ['description'=>'Bagi Hasil Pembelian Paket Soal untuk Disimpan']);
    }
}
