<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionPackageAnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = DB::table('assigments as a')
        ->selectRaw("a.id,u.name as user_name,g.description as grade,a.code,a.name,
        (
            select std(ass.total_score) from assigment_sessions ass 
            inner join assigments a2 on a2.id=ass.assigment_id
            where 
                a2.is_publish=1 and a2.teacher_id is not null #teacher_id NOT NULL adalah slave soal dari master soal
                and a2.ref_id=a.id
        ) as score,
        (
            select count(1) from assigment_sessions ass 
            inner join assigments a2 on a2.id=ass.assigment_id
            where 
                a2.is_publish=1 and a2.teacher_id is not null #teacher_id NOT NULL adalah slave soal dari master soal
                and a2.ref_id=a.id
        ) as scores_count,
        a.created_at    
        ")
        ->join('grades as g', 'g.id','=','a.grade_id')
        ->join('users as u', 'u.id','=','a.user_id')

        // paket soal adalah assigments dengan kondisi teacher_id IS NULL dan is_publish=1
        ->where('a.is_publish',true)
        ->whereNull('a.teacher_id')
        ->havingRaw('score is not null');

      
        if($request->query('educational_level_id') || $request->query('grade_id')){
            $educational_level_id = $request->query('educational_level_id');
            $grade_id = $request->query('grade_id');
            // filter jenjang
            if(!empty($educational_level_id)){
                $data->where('g.educational_level_id', $educational_level_id);
            }
             // filter kelas
            if(!empty($grade_id)){
                $data->where('g.grade_id', $grade_id);
            }   
        }
       
        // $data->where ('a.id',278);

        $itemsPerPage=100;
        if($request->query('itemsPerPage')){
            $itemsPerPage = $request->query('itemsPerPage');
            if($itemsPerPage==-1){
                $itemsPerPage=9999999999;
            }
        }
        
        $paginate = $data->orderBy('scores_count','desc')->paginate($itemsPerPage)->withQueryString();
        return $paginate;
      

    }
    public function calculate($arr){
        $num_of_elements = count($arr); 
        $variance = 0.0; 
        $average = array_sum($arr)/$num_of_elements; 
        foreach($arr as $i) 
        { 
            $variance += pow(($i - $average), 2); 
        } 
          
        return (float)sqrt($variance/$num_of_elements); 
    }
    public function topsis(){
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

        $attributes = ['scores_count'=>['weight'=>5, 'type'=>'benefit'],
        'score'=>['weight'=>4, 'type'=>'cost']
        ];
        $topsis = new \App\Helper\Topsis($attributes, $data);
        $topsis->addPreferenceAttribute();
        $new_data = $topsis->calculate();
        foreach($new_data as $value){
            $value->preference_score = round($value->preference_score, 3);
            $value->score = round($value->score, 3);
        }
        return $new_data;

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
