<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FillRefIds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fillrefids';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah untuk mengisi ref_id pada table question_lists';

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
        $master = DB::select("select aql.*,ql.name from assigment_question_lists aql 
        inner join assigments a on a.id=aql.assigment_id 
        inner join question_lists ql on ql.id=aql.question_list_id
    where 
        #exists(select 1 from assigment_types where id=assigment_type_id and (`description`='textarea' or `description`='textfield')) AND #hanya memilih soal yang uraian/teks
        a.user_id=aql.creator_id AND 
        a.is_publish=0 #is_publish = 0 yaitu butir soal
        
    ORDER BY aql.id desc");
    
        $slave = DB::select("select * from question_lists q where exists(
            select 1 from assigment_question_lists aql 
                inner join assigments a on a.id=aql.assigment_id 
            where 
                aql.question_list_id=q.id and a.user_id!=aql.creator_id and a.is_publish=1
        ) order by q.id desc;");
        $has_master_count=0;
        $update_command = "";
        foreach($slave as $slave_data){
            $found=false;
            foreach($master as $master_data){
                if($slave_data->name===$master_data->name){
                    $has_master_count++;
                    $found=true;
                    echo "[+] question_lists id = {$slave_data->id} has ref_id = {$master_data->question_list_id}\n";
                    $update_command .= "UPDATE question_lists SET ref_id={$master_data->question_list_id} WHERE id={$slave_data->id};\n";
                    DB::table('question_lists')->where('id',$slave_data->id)->update([
                        'ref_id'=>$master_data->question_list_id
                    ]);
                    // echo $slave_data->id." ".$slave_data->name."\n";
                    break;
                }
            }
            // if(!$found){
            //     echo $slave_data->id." ".$slave_data->name."\n";
            // }
        }
        // echo count($slave);
        // echo $update_command;
        return 0;
    }
}
