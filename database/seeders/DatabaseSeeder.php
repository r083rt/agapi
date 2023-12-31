<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use AnswerListTypeSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            AnswerListTypeSeeder::class,
            EventCategoriesTableSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
