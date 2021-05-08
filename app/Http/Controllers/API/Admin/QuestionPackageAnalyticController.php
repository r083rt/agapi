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
        ->selectRaw("a.id,a.user_id,u.name as user_name,g.description as grade,a.code,a.name,a.semester,(
            select group_concat(ql.id) from assigment_question_lists aql inner join question_lists ql on aql.question_list_id=ql.id where aql.assigment_id=a.id
        )  as question_list_ids, (
            select group_concat(ass.total_score) from assigment_sessions ass where ass.assigment_id=a.id
        ) as scores,(
            select count(ass.total_score) from assigment_sessions ass where ass.assigment_id=a.id
        ) as scores_count,
        a.created_at
        ")
        ->join('grades as g', 'g.id','=','a.grade_id')
        ->join('users as u', 'u.id','=','a.user_id')

        // paket soal adalah assigments dengan kondisi teacher_id IS NULL dan is_publish=1
        ->where('a.is_publish',true)
        ->whereNull('a.teacher_id');

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
                $query->where('g.grade_id', $grade_id);
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
        // foreach($paginate as $question_list){
        //     $question_list->question_list_name = strip_tags($question_list->question_list_name);
        //     $scores = explode(',', $question_list->scores);
        //     $scores_value = [];
        //     foreach($scores as $score) 
        //     { 
        //         array_push($scores_value,floatval($score));
        //     } 
        //     $question_list->std = round($this->calculate($scores_value),2);
        // }
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
