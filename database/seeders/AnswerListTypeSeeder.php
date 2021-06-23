<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnswerListType;
use \DB;
class AnswerListTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answer_list_types')->delete();
        AnswerListType::updateOrCreate([
            'name'=>'audio',
        ], ['description'=>'Jawaban berupa audio']);
        AnswerListType::updateOrCreate([
            'name'=>'image',
        ], ['description'=>'Jawaban berupa gambar']);
        AnswerListType::updateOrCreate([
            'name'=>'text',
        ], ['description'=>'Jawaban berupa text singkat']);
       
        
    }
}
