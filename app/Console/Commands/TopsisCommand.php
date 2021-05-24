<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helper\Topsis;
use DB;
use Carbon\Carbon;
class TopsisCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topsis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hitung topsis unt';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    public function getSelectoptionsQuestionLists(){
        $data = DB::table('assigment_question_lists as aql')
        ->selectRaw("aql.id,aql.assigment_id,aql.question_list_id,u.name as user_name,g.description as grade,ql.name as question_list_name,ql.created_at, 
        (
            select count(1) from questions q 
                inner join question_lists ql2 on q.question_list_id=ql2.id 
                inner join assigment_question_lists aql2 on aql2.question_list_id=q.question_list_id
                inner join assigments a2 on a2.id=aql2.assigment_id
            where ql2.ref_id=ql.id and a2.teacher_id is not null #teacher_id jika NULL, maka soalnya adalah soal master (latihan mandiri), tidak soal yg dibagikan (kerjakan soal)
            and q.score=100
        ) as correct_total,
        (
            select count(1) from questions q 
                inner join question_lists ql2 on q.question_list_id=ql2.id 
                inner join assigment_question_lists aql2 on aql2.question_list_id=q.question_list_id
                inner join assigments a2 on a2.id=aql2.assigment_id
            where ql2.ref_id=ql.id and a2.teacher_id is not null #teacher_id jika NULL, maka soalnya adalah soal master (latihan mandiri), tidak soal yg dibagikan (kerjakan soal)
        ) as scores_count,
        (select correct_total/scores_count) as score
        ")
        ->join('assigments as a','a.id','=','aql.assigment_id')
        ->join('question_lists as ql','ql.id','=','aql.question_list_id')
        ->join('users as u','u.id','=','a.user_id')
        ->join('grades as g', 'g.id','=','a.grade_id')

        // memastikan bahwa pembuat assigment sama dengan pembuat soal
        ->whereColumn('a.user_id','aql.creator_id')->where('a.is_publish',false)
        ->whereExists(function($query){
            // hanya mengambil soal isian (tidak pilihan ganda)
            $query->select(DB::raw(1))->from('assigment_types')->whereColumn('assigment_types.id','aql.assigment_type_id')->where('description','selectoptions');
        })
        ->havingRaw('score is not null')->get();
        return $data;
    }
    public function getTextfieldQuestionLists(){
        $data = DB::table('assigment_question_lists as aql')
        ->selectRaw("aql.id,aql.assigment_id,aql.question_list_id,u.name as user_name,g.description as grade,ql.name as question_list_name,ql.created_at, 
        (
            select std(if(q.score is null,0,q.score)) from questions q 
                inner join question_lists ql2 on q.question_list_id=ql2.id 
                inner join assigment_question_lists aql2 on aql2.question_list_id=q.question_list_id
                inner join assigments a2 on a2.id=aql2.assigment_id
            where ql2.ref_id=ql.id and a2.teacher_id is not null #teacher_id jika NULL, maka soalnya adalah soal master (latihan mandiri), tidak soal yg dibagikan (kerjakan soal)
        ) as score,
        (
            select count(1) from questions q 
                inner join question_lists ql2 on q.question_list_id=ql2.id 
                inner join assigment_question_lists aql2 on aql2.question_list_id=q.question_list_id
                inner join assigments a2 on a2.id=aql2.assigment_id
            where ql2.ref_id=ql.id and a2.teacher_id is not null #teacher_id jika NULL, maka soalnya adalah soal master (latihan mandiri), tidak soal yg dibagikan (kerjakan soal)
        ) as scores_count
        ")
        ->join('assigments as a','a.id','=','aql.assigment_id')
        ->join('question_lists as ql','ql.id','=','aql.question_list_id')
        ->join('users as u','u.id','=','a.user_id')
        ->join('grades as g', 'g.id','=','a.grade_id')

        // memastikan bahwa pembuat assigment sama dengan pembuat soal
        ->whereColumn('a.user_id','aql.creator_id')->where('a.is_publish',false)
        ->whereExists(function($query){
            // hanya mengambil soal isian (tidak pilihan ganda)
            $query->select(DB::raw(1))->from('assigment_types')->whereColumn('assigment_types.id','aql.assigment_type_id')->where(function($query2){
                $query2->where('description','textarea')->orWhere('description','textfield');
            });
        })
        ->havingRaw('score is not null')->get();
        return $data;
    }
    public function getQuestionListsPackages(){
        $data = DB::table('assigments as a')
        ->selectRaw("a.id,u.name as user_name,g.description as grade,a.code,a.name,
        a.created_at,
        (
            select std(ass.total_score) from assigment_sessions ass 
            inner join assigments a2 on a2.id=ass.assigment_id
            where 
                a2.is_publish=1 and a2.teacher_id is not null #teacher_id NOT NULL adalah slave soal dari master soal
                and a2.ref_id=a.id
        ) as score, (
            select count(1) from assigment_sessions ass 
            inner join assigments a2 on a2.id=ass.assigment_id
            where 
                a2.is_publish=1 and a2.teacher_id is not null #teacher_id NOT NULL adalah slave soal dari master soal
                and a2.ref_id=a.id
        ) as scores_count    
        ")
        ->join('grades as g', 'g.id','=','a.grade_id')
        ->join('users as u', 'u.id','=','a.user_id')

        // paket soal adalah assigments dengan kondisi teacher_id IS NULL dan is_publish=1
        ->where('a.is_publish',true)
        ->whereNull('a.teacher_id')
        ->havingRaw('score is not null')->get();

        return $data;
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $datetime = Carbon::now();
        // attributes untuk paket soal dan butir soal esai
        $attributes = ['scores_count'=>['weight'=>5, 'type'=>'benefit'],
        'score'=>['weight'=>4, 'type'=>'cost']
        ];
        $data = $this->getQuestionListsPackages();
        $topsis = new Topsis($attributes, $data);
        $topsis->addPreferenceAttribute();
        $new_data = $topsis->calculate();
        $insert = [];
        foreach($new_data as $assigment){
            array_push($insert, ['assigment_id'=>$assigment->id,
            'score'=>$assigment->preference_score,
            'created_at'=> $datetime,
            'updated_at'=> $datetime
            ]);
          
        }
        echo DB::table('top_assigments')->insert($insert);

        $data = $this->getTextfieldQuestionLists();
        $topsis = new Topsis($attributes, $data);
        $topsis->addPreferenceAttribute();
        $new_data = $topsis->calculate();
        $insert = [];
        foreach($new_data as $question_list){
            array_push($insert, ['question_list_id'=>$question_list->question_list_id,
            'score'=>$question_list->preference_score,
            'created_at'=> $datetime,
            'updated_at'=> $datetime
            ]);
        }
        echo DB::table('top_question_lists')->insert($insert);
        // $insert = [];

        $attributes['score']['type'] = 'benefit';
        $data = $this->getSelectoptionsQuestionLists();
        $topsis = new Topsis($attributes, $data);
        $topsis->addPreferenceAttribute();
        $new_data = $topsis->calculate();
        $insert = [];
        foreach($new_data as $question_list){
            array_push($insert, ['question_list_id'=>$question_list->question_list_id,
            'score'=>$question_list->preference_score,
            'created_at'=> $datetime,
            'updated_at'=> $datetime
            ]);
        }
        echo DB::table('top_question_lists')->insert($insert);
    
        return 0;
    }
}
