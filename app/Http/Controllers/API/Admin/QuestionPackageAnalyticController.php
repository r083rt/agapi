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
        
        $paginate = $data->paginate($itemsPerPage)->withQueryString();
        foreach($paginate as $assigment){
          
            $scores = DB::table('assigment_sessions as ass')->
            whereNotNull('ass.total_score')->
            whereExists(function($query)use($assigment){
                $query->select(DB::raw(1))
                ->from('assigments as a')
                ->whereColumn('a.id','ass.assigment_id')
                ->whereNotNull('a.teacher_id')
                ->where('a.is_publish',1)
                ->where('a.ref_id', $assigment->id);
            });
            
            $scores_value = [];
            $scores = $scores->get();
            foreach($scores as $score){
                array_push($scores_value,floatval($score->total_score));
            }
            $assigment->scores = $scores_value;
            $assigment->scores_count = count($scores_value);
            // $question_list->question_list_name = strip_tags($question_list->question_list_name);
            
            $assigment->std = null;
            if($assigment->scores_count>0)$assigment->std = round($this->calculate($scores_value),2);
        }
        // return $paginate->items();
        $items = $paginate->items();
        usort($items, function($a, $b){
            if($a->scores_count === $b->scores_count)return 0;
            return ($a->scores_count < $b->scores_count) ? 1:-1;
        });
        // return $paginate;
        return [
            'current_page'=>$paginate->currentPage(),
            'data'=>$items,
            'next_page_url'=>$paginate->nextPageUrl(),
            'prev_page_url'=>$paginate->previousPageUrl(),
            'total'=>$paginate->total(),
            'per_page'=>$paginate->perPage(),
            'last_page'=>$paginate->lastPage()
        ];

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
