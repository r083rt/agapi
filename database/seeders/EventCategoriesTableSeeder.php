<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventCategory;

class EventCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            "Seminar",
            "Pelatihan",
            "Workshop",
            "Webinar",
            "Lomba",
        ];

        // jika data tidak ada maka insert
        foreach ($data as $key => $value) {
            $check = EventCategory::where('name',$value)->first();
            if(!$check){
                EventCategory::create([
                    'name' => $value,
                ]);
            }
        }
    }
}
