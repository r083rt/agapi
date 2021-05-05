<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionAnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data = DB::table('assigment_question_lists as aql')->join('assigments as a','a.id','=','aql.assigment_id')
        ->selectRaw("select group_concat(q.score) from questions q where exists(
            select 1 from question_lists ql2 where ql2.id=q.question_list_id and ql2.ref_id=ql.id
        ) as scores")
        ->join('question_lists as ql','ql.id','=','aql.question_list_id')
        ->whereColumn('a.user_id','aql.creator_id')->where('a.is_publish',false)
        // hanya mengambil soal isian (tidak pilihan ganda)
        ->whereExists(function($query){
            $query->select(DB::raw(1))->from('assigment_types')->whereColumn('assigment_types.id','aql.assigment_type_id')->where(function($query2){
                $query2->where('description','textarea')->orWhere('description','textfield');
            });
        });
        return $data->limit(100)->orderBy('aql.id','desc')->get();

        $assigment = \App\Models\Assigment::has('question_lists.questions')->with(['question_lists.questions'=>function($query){

        }]);
        // filter jenjang
        if($request->query('educational_level_id')){
            $educational_level_id = $request->query('educational_level_id');
            $assigment->whereHas('grade', function($query2)use($educational_level_id){
                $query2->where('educational_level_id',$educational_level_id);
            });
        }
        // filter kelas
        if($request->query('grade_id')){
            $grade_id = $request->query('grade_id');
            $assigment->where('grade_id', $grade_id);
        }
        // $assigment->selectRaw("select count(*) from questions");
        return $assigment->limit(10)->orderBy('id','desc')->get();
        
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
