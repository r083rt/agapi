<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Assigment;
class TaggableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // p3k
        $tag = Tag::where('name','P3K')->first();
        $ids = [17353, 17354, 17355, 17360, 17361, 17366];
        $assigments = Assigment::whereIn('id',$ids)->get();
        foreach($assigments as $assigment){
            print_r($assigment->tags()->sync([$tag->id]));
        }

        // manajerial
        $tag = Tag::where('name','Manajerial')->first();
        $ids = [17373];
        $assigments = Assigment::whereIn('id',$ids)->get();
        foreach($assigments as $assigment){
            print_r($assigment->tags()->sync([$tag->id]));
        }

        // sosiokultur
        $tag = Tag::where('name','Sosiokultural')->first();
        $ids = [17374];
        $assigments = Assigment::whereIn('id',$ids)->get();
        foreach($assigments as $assigment){
          print_r($assigment->tags()->sync([$tag->id]));
        }
    }
}
