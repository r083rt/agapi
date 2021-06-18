<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnswerListType;
class AnswerListTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnswerListType::updateOrCreate([
            'name'=>'audio',
        ], ['description'=>'Jawaban berupa audio']);
        AnswerListType::updateOrCreate([
            'name'=>'image',
        ], ['description'=>'Jawaban berupa gambar']);
        AnswerListType::updateOrCreate([
            'name'=>'textfield',
        ], ['description'=>'Jawaban berupa text singkat']);
        AnswerListType::updateOrCreate([
            'name'=>'textarea',
        ], ['description'=>'Jawaban berupa text panjang/uraian']);
        AnswerListType::updateOrCreate([
            'name'=>'selectoptions',
        ], ['description'=>'Jawaban berupa pilihan ganda']);
        
    }
}
