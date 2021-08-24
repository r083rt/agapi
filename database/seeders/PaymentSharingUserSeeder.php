<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PaymentSharingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $pass = Hash::make('bismillah');
        User::updateOrCreate([
            'email'=>'dpp@dpp',
        ], ['name'=>'Akun DPP', 'user_activated_at'=>$now, 'password'=>$pass] );

        User::updateOrCreate([
            'email'=>'dana_simpan@dana_simpan',
        ], ['name'=>'Akun Dana Simpan', 'user_activated_at'=>$now, 'password'=>$pass]);

       
    }
}
