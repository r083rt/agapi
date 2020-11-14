<?php

namespace App\Http\Controllers\API\v1;

use App\Models\AssigmentSession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\Assigment;
use App\Models\Question;
use App\Models\Answer;
use App\Models\AnswerList;
use App\Models\QuestionList;
use Illuminate\Support\Facades\Log;


class AssigmentSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $isTraining = false; //jika True maka soalnya adalah latihan mandiri

        //mengecek apakah soal latihan mandiri atau tidak dengan cara mengecek apakah request dari latihan soal dan mengecek apakah jumlah soal pilihan ganda yang kirim sama dengan jumlah soal pilihan ganda di db
        $assigment = Assigment::with('question_lists.answer_lists')->findOrFail($request->id);
        if($request->has('_training') && $assigment->has('question_lists_select_options_only','=',count($request->question_lists))){
            $isTraining=true;
        }

        //jika soal tidak latihan mandiri,cek apakah user sudah mengerjakan soal ini
        if(!$isTraining){
            $check=Assigment::with('auth_sessions')->has('auth_sessions')->find($request->id);
            if($check){
                return response()->json(["error"=>"Siswa sudah mengerjakan soal ini",'session'=>$check]);
            }
        }
       // return $request;
        $assigment = Assigment::with('question_lists.answer_lists')->findOrFail($request->id);

        $selectoptions_ids = \App\Models\AssigmentType::where('description','=','selectoptions')->get()->map(function($value){
            return $value->id;
        });

        $session = new Session;
        $session->user_id = $request->user()->id;
        $session->value = $request->value ?? null;
        $session->save();
        $selectoptions_count = 0;
        $total_score=0; //hanya digunakan jika soal pilihan ganda semua
       
        //$assigment->sessions()->save($session,['user_id'=>$request->teacher_id]);
        $assigment_session = new \App\Models\AssigmentSession;
        $assigment_session->assigment_id = $assigment->id;
        $assigment_session->session_id = $session->id;
        $assigment_session->user_id = $assigment->teacher_id;
        $assigment_session->save();
        //Fungsi sync tidak digunakan agar Observer nya bisa ter-trigger oleh kode di atas
        //$session->assigments()->sync([$assigment->id=>['user_id'=>$assigment->teacher_id]]);
        


        if($request->has('question_lists')){
            $user_questions = collect($request->question_lists);
            foreach ($assigment->question_lists as $q => $question_list) {
                # code...
                $is_optionselects = false;
                //$question_list = $assigment->question_lists()->findOrFail($question['id']); 
                if($selectoptions_ids->contains($question_list->pivot->assigment_type_id)){ //cek apakah soal ini pilihan ganda
                    $selectoptions_count++;
                    $is_optionselects = true;
                }

                //mengecek apakah paket soal yang dikirim mempunyai id soal yg sesuai dgn yg ada di db
                if($user_questions->contains('id',$question_list->id)){ 
                    
                    $user_question = $user_questions->firstWhere('id',$question_list->id);
                    // if(!isset($user_question['answer']['id'])){
                    //     return $question_list;
                    // }
                    $user_answer = $question_list->answer_lists()->findOrFail($user_question['answer']['id']); //mendapatkan jawaban dari questions
                
                    if(!$is_optionselects){
                        $user_answer->value = null;
                        $user_answer->name = $user_question['answer']['name'];
                    }
                    if($user_answer->value==100) $total_score += 100;
                    
                    $db_question = new Question();
                    $db_question->fill($question_list->toArray());
                    $db_question->question_list_id =  $user_answer->question_list_id;
                    $db_question->score = $user_answer->value;
    
                    $session->questions()->save($db_question);
                    // insert answer to question
                    $db_answer = new Answer;
                    $db_answer->fill($user_answer->toArray());
                    $db_answer->answer_list_id = $user_answer->id;
                    $db_question->answer()->save($db_answer);
                }

                
            }
        }
        Log::debug('test assigment_session_controller');
        //mengecek apakah request dari latihan soal dan mengecek apakah jumlah soal pilihan ganda yang kirim sama dengan jumlah soal pilihan ganda di db
        if($isTraining){
           // return $assigment->withCount('question_lists_select_options_only')->get();
            $assigment->assigment_session->total_score=round($total_score/$selectoptions_count, 2);
            $assigment->assigment_session->save();
            return response()->json(['score'=>['value'=>round($total_score/$selectoptions_count, 2)], 'data'=>$session->load([
                //'questions.answer',
                'questions',
                'assigments'
            ])]);
        }
        //jika soal merupakan ujian, tidak latihan soal, maka jalankan kode dbawah
        else{
            $isTemporary = true;
            $value=0;
            if($selectoptions_count==count($assigment->question_lists)){ //jika soalnya pilihan ganda semua, maka otomatis ternilai
                $isTemporary = false;
                $assigment->assigment_session->total_score = $value = round($total_score/count($assigment->question_lists), 2);
                $assigment->assigment_session->save();
                //\App\Models\User::find(auth('api')->user()->id)->notify();
            }
            return response()->json(['score'=>['isTemporary'=>$isTemporary, 'value'=>$value, 'data'=>$session->load([
                //'questions.answer',
                'questions',
                'assigments'
            ])]]);

        }
        
      
    }
    // public function checkAndStore(Request $request){
    //     $total_score=0;
    //     foreach($request['question_lists'] as $question_list){
    //         $is_right = QuestionList::findOrFail($question_list['id'])->answer_lists()->findOrFail($question_list['answer']['id'])->value==100 ? true : false;
    //         if($is_right)$total_score++;
    //     }
    //     $total_score = round($total_score/count($request['question_lists'])*100, 2); 
    //     //buat session baru dan simpan nilai untuk setiap question
    //     $session = new Session;
    //     $session->user_id = $request->user()->id;
    //     $session->value = $total_score;
    //     $session->save();

    //     $assigment = Assigment::findOrFail($request->id);
    //     $assigment->sessions()->save($session, ['user_id'=>$request['user_id'], 'total_score'=>$total_score]);

    //     //$assigment->value=$total_score;
    //     return response()->json($session->load([
    //         'assigments'
    //     ]));
    // }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssigmentSession  $assigmentSession
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = AssigmentSession::with('assigment.grade','teacher')->findOrFail($id);
        return $res;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssigmentSession  $assigmentSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssigmentSession $assigmentSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssigmentSession  $assigmentSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssigmentSession $assigmentSession)
    {
        //
    }
}
