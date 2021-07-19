<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::updateOrCreate([
            'name'=>'P3K',
        ]);
        Tag::updateOrCreate([
            'name'=>'Manajerial',
        ]);
        Tag::updateOrCreate([
            'name'=>'Sosiokultural',
        ]);
    }
}
