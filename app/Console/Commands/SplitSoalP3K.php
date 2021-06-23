<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Assigment;
use DB;
class SplitSoalP3K extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'splitsoalp3k';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        try{
            DB::beginTransaction();
            $assigment = Assigment::with('question_lists')->find(7808);

            // $index=0;
            // $split = 3;
            // $max = 150;
            // $partition = ceil($max/$split);
            // echo $partition;
            // $i=0;
            // while($index<$count){
            //     if($index%$partition==0){
            //         $assigment1 = new Assigment;
            //         $assigment1->topic = 'Soal P3K Kompetensi Teknis '.$i+1;
            //         $assigment1->subject = 'Soal P3k Kompetensi Teknis '.$i+1;
            //         $assigment1->name = 'Soal P3k Kompetensi Teknis '.$i+1;
            //         $assigment1->description = 'Soal P3k Kompetensi Teknis '.$i+1;
            //         $assigment1->grade_id = 1;
            //         $assigment1->is_publish = 0;
            //         $assigment1->assigment_category_id = 1;
            //         $assigment1->save();
            //         echo "[+] Assigment ID P3K Soal ".($i+1).": ".$assigment1->id."\n";
            //         $data = [];
            //     }

            //     $data = [];
            //     for($i=0; $i<50; $i++){
            //         if(!isset($assigment->question_lists[$i]))break;
            //         $data[$assigment->question_lists[$i]->id] = [
            //             'creator_id'=>1,
            //             'user_id'=>1,
            //             'assigment_type_id'=>19,
            //         ];
            //     }
            //     $index++;

            // }
            $assigment1 = new Assigment;
            $assigment1->topic = 'Soal P3K Kompetensi Teknis 1';
            $assigment1->subject = 'Soal P3k Kompetensi Teknis 1';
            $assigment1->name = 'Soal P3k Kompetensi Teknis 1';
            $assigment1->description = 'Soal P3k Kompetensi Teknis 1';
            $assigment1->grade_id = 1;
            $assigment1->is_publish = 0;
            $assigment1->assigment_category_id = 1;
            $assigment1->save();
            echo '[+] Assigment ID P3K Soal 1: '.$assigment1->id."\n";
            $data = [];

            for($i=0; $i<50; $i++){
                if(!isset($assigment->question_lists[$i]))return 0;
                $data[$assigment->question_lists[$i]->id] = [
                    'creator_id'=>1,
                    'user_id'=>1,
                    'assigment_type_id'=>19,
                ];
            }
            $attach = $assigment1->question_lists()->attach($data);
            echo "[+]Attach Id's:";
            print_r(count($data));
            
            $assigment1 = new Assigment;
            $assigment1->topic = 'Soal P3K Kompetensi Teknis 2';
            $assigment1->subject = 'Soal P3k Kompetensi Teknis 2';
            $assigment1->name = 'Soal P3k Kompetensi Teknis 2';
            $assigment1->description = 'Soal P3k Kompetensi Teknis 2';
            $assigment1->grade_id = 1;
            $assigment1->is_publish = 0;
            $assigment1->assigment_category_id = 1;
            $assigment1->save();
            echo '[+] Assigment ID P3K Soal 2: '.$assigment1->id."\n";
            $data = [];
            for($i=50; $i<100; $i++){
                if(!isset($assigment->question_lists[$i]))return 0;
                $data[$assigment->question_lists[$i]->id] = [
                    'creator_id'=>1,
                    'user_id'=>1,
                    'assigment_type_id'=>19,
                ];
            }
            
            $attach = $assigment1->question_lists()->attach($data);
            echo "[+]Attach Id's:";
            print_r(count($data));

            $assigment1 = new Assigment;
            $assigment1->topic = 'Soal P3K Kompetensi Teknis 3';
            $assigment1->subject = 'Soal P3k Kompetensi Teknis 3';
            $assigment1->name = 'Soal P3k Kompetensi Teknis 3';
            $assigment1->description = 'Soal P3k Kompetensi Teknis 3';
            $assigment1->grade_id = 1;
            $assigment1->is_publish = 0;
            $assigment1->assigment_category_id = 1;
            $assigment1->save();
            echo '[+] Assigment ID P3K Soal 3: '.$assigment1->id."\n";
            $data = [];
            for($i=100; $i<150; $i++){
                if(!isset($assigment->question_lists[$i]))return 0;
                $data[$assigment->question_lists[$i]->id] = [
                    'creator_id'=>1,
                    'user_id'=>1,
                    'assigment_type_id'=>19,
                ];
            }
            
            
            $attach = $assigment1->question_lists()->attach($data);
            echo "[+]Attach Id's:";
            print_r(count($data));

            // print_r($assigment->question_lists);
            // return 0;

            DB::commit();
        }catch(Exception $exception){
            print_r($exception);
            DB::rollBack();
        }
       
    }
}
