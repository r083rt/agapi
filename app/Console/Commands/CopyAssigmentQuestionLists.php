<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
class CopyAssigmentQuestionLists extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copyassigmentquestionlists';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy butir soal dri beberapa assigment ke 1 assigment tertentu';

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
        $assigment_sources = [7818, 7817];
        $assigment_destination = 7816;

        $data = DB::table('assigment_question_lists as aql')->whereIn('assigment_id',$assigment_sources)->get();
        $insert = [];
        foreach($data as $cok){
            $insert[] = [
                'assigment_id'=>$assigment_destination,
                'creator_id'=>$cok->creator_id,
                'user_id'=>$cok->user_id,
                'question_list_id'=>$cok->question_list_id,
                'assigment_type_id'=>$cok->assigment_type_id,
            ];
        }
        // print_r();
        $insert = DB::table('assigment_question_lists')->insert($insert);
        print_r($insert);
        // print_r($data->get());
        return 0;

        

    }
}
