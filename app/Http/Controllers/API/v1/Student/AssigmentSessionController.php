<?php

namespace App\Http\Controllers\API\v1\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;
use App\Models\AssigmentSession;
use App\Models\Session;
use DB;
use Carbon\Carbon;
use App\Models\Question;
use App\Models\Answer;

class AssigmentSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 111;
    }
    function checkIsSame($a, $b){
        if(count($a)!==count($b))return false;
        sort($a);
        sort($b);
        foreach($a as $k=>$v){
            if($v!==$b[$k])return false;
        }
        return true;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
       
        $request->validate([
            'id'=>'required',
            'question_lists'=>'required|array',
            // 'question_lists.*.answer'=>'required',
            // 'question_lists.*.answer.id'=>'required|integer',
            // 'question_lists.*.answer.name'=>'nullable',
            // 'question_lists.*.answer'=>'required',
        ]);

        $user = $request->user();
        $user->load('profile');
        $educationalLevelId = $user->profile->educational_level_id;
        $assigment = Assigment::with(['question_lists'=>function($query)use($request){
            $query->selectRaw('question_lists.*,ats.description as assigment_type')
            ->join('assigment_question_lists as aql','aql.question_list_id','=','question_lists.id')
            ->join('assigment_types as ats','ats.id','=','aql.assigment_type_id')
            ->where('aql.assigment_id', $request->id);

            // ->groupBy('aql.question_list_id');
        }, 'question_lists.answer_lists'])
        ->withCount('question_lists')
        ->whereHas('grade',function($query)use($educationalLevelId){
            $query->where('educational_level_id',$educationalLevelId);
        })->findOrFail($request->id);

        if(!$assigment->isWorkable()){
            throw new \Exception('Soal tidak bisa dikerjakan');
        }
        // cek apakah ada 1 sesi yg punya assigment tsb
        $check_session = Session::where('user_id',$user->id)->whereHas('assigments', function($query)use($assigment){
            $query->where('assigments.id',$assigment->id);
        });

        if($check_session->exists()){
            $session = $check_session->first();

             // jika jumlah questions sama dengan jumlah question_lists, maka berarti pengerjaannya sudah disubmit
            if($session->questions_count===$assigment->question_lists_count){
                throw new \Exception('Soal sudah disubmit');
            }
            // jika selisih menit waktu sekarang dan waktu di session.created_at melebihi assigment.timer+1, maka timer habis
            if(!empty($assigment->timer)){
                $timer = intval($assigment->timer);
                $diff_minutes = Carbon::now()->diffInMinutes($session->created_at);
                // toleransi 1 menit (+1)
                if($diff_minutes>$timer+1){
                    throw new \Exception('Waktu Habis');
                }
            }

        }else {
            throw new \Exception('Session belum dibuat');
        }

        
        // taruh question_lists yg disubmit ke data array based key
        // $user_questions = collect($request->question_lists);
        $submitted_question_lists = [];
        $submitted_question_lists_ids = [];
        foreach($request->question_lists as $question_list){
            $submitted_question_lists[$question_list['id']] = $question_list;
            $submitted_question_lists_ids[] = $question_list['id'];
        }

        // taruh question_lists dari database ke data array based key
        $db_question_lists = [];
        $db_question_lists_ids = [];
         
        foreach($assigment->question_lists as $question_list){
            $db_question_lists[$question_list->id] = $question_list->toArray();
            $db_question_lists[$question_list->id]['arr_answer_lists'] = [];
            foreach($question_list->answer_lists as $answer_list){
                $db_question_lists[$question_list->id]['arr_answer_lists'][$answer_list->id] = $answer_list->toArray();
            }
            $db_question_lists_ids[] = $question_list->id;
        }

         // jika id's question_lists yg disubmit tidak sama dgn id's di db maka throw error
        if(!$this->checkIsSame($db_question_lists_ids,$submitted_question_lists_ids)){
            throw new \Exception("ID's question_lists tidak sama dengan yg ada di database -_-");
        }

        $selectoptions_count = 0;
        $total_score=0; //hanya digunakan jika soal pilihan ganda semua
        // return $db_question_lists;
        // return $assigment;
        try{
            DB::beginTransaction();
            foreach ($db_question_lists as $ql=>$question_list) {

                $is_selectoptions = false;
               
                if($question_list['assigment_type']==="selectoptions"){
                    $selectoptions_count++;
                    $is_selectoptions = true;
                }
                // submitted_answer adalah question_lists.*.answer yg disubmit user
                $submitted_answer = null;
                if(isset($submitted_question_lists[$ql]['answer']['id'])){
                    $submitted_answer = $submitted_question_lists[$ql]['answer'];
                }
    
                $score = 0; // jika type soal textfield/textarea, maka $score=0
                $selected_db_answer = null;
    
                // jika type soal selectoptions dan $submitted_answer tidak NULL, maka koreksi soal
                if($is_selectoptions && $submitted_answer){
                    // cek apakah db answer_lists ada menurut answer yg disubmit
                    if(isset($question_list['arr_answer_lists'][$submitted_answer['id']])){
                        $selected_db_answer = $question_list['arr_answer_lists'][$submitted_answer['id']];
                        // jika jawaban benar nilai $score adalah 100
                        $score = $selected_db_answer['value'];
                    }
                    $total_score += $score;
                }
                
                
    
                // insert session to to question
                $db_question = new Question();
                $db_question->fill($question_list);
                $db_question->question_list_id =  $ql;
                $db_question->score = $score;
    
                $session->questions()->save($db_question);
                // insert answer to question
                $db_answer = new Answer;
                if($selected_db_answer==null){
                    $db_answer->name = !$is_selectoptions ? $submitted_answer['name']:null;
                    $db_answer->answer_list_id = null;
                    $db_answer->value = null;
                }else{
                    $db_answer->fill($selected_db_answer);
                    $db_answer->answer_list_id = $selected_db_answer['id'];
                }
              
                
                $db_question->answer()->save($db_answer);
                return $db_answer;
    
            }

            DB::commit();
        }catch(\PDOException $e){
            DB::rollBack();
            return response($e,500);
           
        }catch(\Exception $e){
            DB::rollBack();
            return response($e,500);
          
        }
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
    public function createAssigmentSession(Request $request){
        $request->validate([
            'assigment_id'=>'required'
        ]);

        $user = $request->user();
        $userProfile = $user->load('profile');
        $educationalLevelId = $userProfile->profile->educational_level_id;

        $assigment = Assigment::with('teacher','grade')
        ->withCount('question_lists')
        ->whereHas('grade',function($query)use($educationalLevelId){
            $query->where('educational_level_id',$educationalLevelId);
        })
        ->whereNotNull('teacher_id')
        ->findOrFail($request->assigment_id);
        
        $is_workable = true;
        // jika end_at kosong dan jika tgl sekarang belum masuk dalam start_at, maka belum dimulai
        if(!empty($assigment->start_at) && empty($assigment->end_at)){
            $start_at = new Carbon($assigment->start_at);
            $is_workable = Carbon::now()->greaterThanOrEqualTo($start_at);
        
        }
        // jika start_at kosong dan jika tgl sekarang sudah melewati end_at, maka expired
        elseif(empty($assigment->start_at) && !empty($assigment->end_at)){
            $end_at = new Carbon($assigment->end_at);
            $is_expired = Carbon::now()->greaterThanOrEqualTo($end_at);
            $is_workable = !$is_expired;
        }
        // jika start_at dan end_at tidak kosong semua,
        elseif(!empty($assigment->start_at) && !empty($assigment->end_at)){
            $start_at = new Carbon($assigment->start_at);
            $end_at = new Carbon($assigment->end_at);
            $is_workable = Carbon::now()->isBetween($start_at, $end_at);
            // return $is_workable;
        }
        if(!$is_workable)return response("Assigment tidak ada",404);


        $check = Session::with('assigments')->whereHas('assigments', function($query)use($request){
            $query->where('assigments.id',$request->assigment_id);
        })->where('user_id',$user->id);

        if($check->exists()){
            return $check->first();
        }else{
            // return 'abb';
            
            try{
                DB::beginTransaction();
                $session = new Session;
                $session->user_id = $user->id;
                $session->save();
                //user_id = teacher_id yang digunakan pada tahap selanjutnya
                $assigment->sessions()->sync([$session->id => ['user_id'=>$assigment->teacher_id]]);
                DB::commit();
                return $session->load('assigments');
            
            }catch (\PDOException $e) {
                // Woopsy
                
                DB::rollBack();
                dd($e);
            }
        }
       
        // $request->validate([

        // ]);
    }
}
