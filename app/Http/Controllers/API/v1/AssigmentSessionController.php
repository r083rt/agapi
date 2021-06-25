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
use Illuminate\Support\Facades\DB;


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

    // mengurutkan apakah 2 array number sama. contoh: [3,2,1] dan [1,3,2] adalah sama
    function checkIsSame($a, $b){
        if(count($a)!==count($b))return false;
        sort($a);
        sort($b);
        foreach($a as $k=>$v){
            if($v!==$b[$k])return false;
        }
        return true;
    }
    // sama dgn store, bedanya hanya mengambil soal pil. ganda dan langsung menyimpan dan menampilkan total nilai dri soal pil. ganda tsb
    public function store2(Request $request){
        // DB::transaction(function ()use($request) {
            $request->validate([
                'id'=>'required',
                'question_lists'=>'required',
                // 'question_lists.*.answer'=>'required',
            ]);
           
            $assigment = Assigment::with(['question_lists'=>function($query){
                $query->selectRaw('question_lists.*,ats.description as assigment_type')->join('assigment_question_lists as aql','aql.question_list_id','=','question_lists.id')
                ->join('assigment_types as ats','ats.id','=','aql.assigment_type_id')
                ->where('ats.description','selectoptions')
                ->groupBy('aql.question_list_id');
            }, 'question_lists.answer_lists'])->findOrFail($request->id);


            try{
                DB::beginTransaction();

                $session = new Session;
                $session->user_id = $request->user()->id; //diisi dgn auth yg mengerjakan skrng
                // $session->value = $request->value ?? null;
                $session->save();
                
             
            
                //$assigment->sessions()->save($session,['user_id'=>$request->teacher_id]);
                $assigment_session = new AssigmentSession;
                $assigment_session->assigment_id = $assigment->id;
                $assigment_session->session_id = $session->id;
                $assigment_session->user_id = $assigment->teacher_id; //diisi dengan pembuat soal/guru
                $assigment_session->save();
                //Fungsi sync tidak digunakan agar Observer nya bisa ter-trigger oleh kode di atas
                //$session->assigments()->sync([$assigment->id=>['user_id'=>$assigment->teacher_id]]);

                // taruh question_lists yg disubmit ke data array based key
                $user_questions = collect($request->question_lists);
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
                
                $total_score=0; //hanya digunakan jika soal pilihan ganda semua
                foreach ($db_question_lists as $ql=>$question_list) {

                    // cek apakah answer kosong pda question_list yg disubmit
                    $submitted_answer = null;
                    if(isset($submitted_question_lists[$ql]['answer']) && !empty($submitted_question_lists[$ql]['answer'])){
                        $submitted_answer = $submitted_question_lists[$ql]['answer'];
                    }
                    
                    $score = 0;
                    $selected_db_answer = null;
                    // cek apakah db answer_lists ada menurut answer yg disubmit
                    if(isset($question_list['arr_answer_lists'][$submitted_answer])){
                        $selected_db_answer = $question_list['arr_answer_lists'][$submitted_answer];
                        // jika jawaban benar nilai $score adalah 100
                        $score = $selected_db_answer['value'];
                    }
                    $total_score += $score;

                    // insert session to to question
                    $db_question = new Question();
                    $db_question->fill($question_list);
                    $db_question->question_list_id =  $ql;
                    $db_question->score = $score;
    
                    $session->questions()->save($db_question);
                    // insert answer to question
                    $db_answer = new Answer;
                    if($selected_db_answer==null){
                        $db_answer->name = null;
                        $db_answer->answer_list_id = null;
                        $db_answer->value = null;
                    }else{
                        $db_answer->fill($selected_db_answer);
                        $db_answer->answer_list_id = $selected_db_answer['id'];
                    }
                  
                   
                    $db_question->answer()->save($db_answer);
        
                }
                // Log::debug('test assigment_session_controller store2');
                //mengecek apakah request dari latihan soal dan mengecek apakah jumlah soal pilihan ganda yang kirim sama dengan jumlah soal pilihan ganda di db
                $final_score = round($total_score/count($db_question_lists), 2);
                $assigment->assigment_session->total_score = $final_score;
                $assigment->assigment_session->save();

                DB::commit();


                unset($assigment->question_lists);
                $assigment->question_lists = collect();
                foreach($submitted_question_lists_ids as $submitted_question_lists_id){
                    $question_list = $db_question_lists[$submitted_question_lists_id];
                    $question_list['answer'] = $submitted_question_lists[$submitted_question_lists_id]['answer'];
                    $assigment->question_lists->push($question_list);
                }
                

                return response()->json(['score'=>['value'=>$final_score], 'assigment'=>$assigment]);

            }catch(\PDOException $e){
                DB::rollBack();
                return response($e,500);
               
            }catch(\Exception $e){
                DB::rollBack();
                return response($e,500);
              
            }
           
           

            


            
        
        // });
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
    public function history($assigment_id){
        $assigment = Assigment::with(['sessions'=>function($query){
            $query->where('sessions.user_id',auth()->user()->id)->orderBy('id','desc');
        }])->findOrFail($assigment_id);
        return $assigment;
    }
    public function history2(Request $request){
        $request->validate([
            'assigment_ids'=>'required|array'
        ]);
        $sessions = Session::with('assigments')->where('user_id',auth()->user()->id)->whereHas('assigments', function($query)use($request){
            $query->whereIn('assigments.id',$request->assigment_ids);
        })->orderBy('id','desc');
        return $sessions->get();
        // $assigment = Assigment::with(['sessions'=>function($query){
        //     $query->where('sessions.user_id',auth()->user()->id)->orderBy('id','desc');
        // }])->findOrFail($assigment_id);
        // return $assigment;
    }
}
