<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class fillrefids2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fillrefids:assigments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah untuk mengisi ref_id pada table assigments';

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

        $data = DB::select("select a.id,a.user_id,a.topic,a.teacher_id,(
            select group_concat(ql.ref_id) from assigment_question_lists aql 
                inner join question_lists ql on ql.id=aql.question_list_id
            where aql.assigment_id=a.id
         ) as master_question_list_ids,
         (
          select group_concat(a2.id) from assigments a2 
          where 
            exists (
                select group_concat(ql2.ref_id) as master_question_list_ids2 from assigment_question_lists aql2 inner join question_lists ql2 on ql2.id=aql2.question_list_id
                where aql2.assigment_id=a2.id
                having master_question_list_ids2=master_question_list_ids
            )
            and a2.teacher_id is not null #soal yg dishare
            and a2.user_id=a.user_id
         ) as shared_assigment_ids
        from assigments a 
        where 
            a.teacher_id is null #master soal
        having master_question_list_ids is not null and shared_assigment_ids is not null
        order by a.id desc"); 
        foreach($data as $master){
            $shared_ids = explode(',',$master->shared_assigment_ids);
            echo DB::table('assigments')
            ->whereIn('id',$shared_ids)
            ->update(['ref_id'=>$master->id])."\n";
            // print_r($data_to_insert);
        }       
        return 0;
    }
}
