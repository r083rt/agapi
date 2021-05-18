<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelectoptionsQuestionAnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
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
            $query->select(DB::raw(1))->from('assigment_types')->whereColumn('assigment_types.id','aql.assigment_type_id')->where('description','selectoptions');
        });
        // ->havingRaw('scores is not null');
      
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
       
        $itemsPerPage=100;
        if($request->query('itemsPerPage')){
            $itemsPerPage = $request->query('itemsPerPage');
            if($itemsPerPage==-1){
                $itemsPerPage=9999999999;
            }
        }

        $paginate = $data->orderBy('scores_count','desc')->paginate($itemsPerPage)->withQueryString();
        foreach($paginate as $question_list){
          
            $question_list->std = round($question_list->correct_total/$question_list->scores_count*100,2);
        }
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
