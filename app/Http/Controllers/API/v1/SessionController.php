<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
    public function getSessionById($id){
        $session = Session::with('assigment_session','user','questions.answer_lists','questions.answer',
            'questions.assigment_question_list.assigment_type:id,name,description')->whereHas('questions.assigment_question_list',
            function($q){
                $q->where('user_id','=',auth('api')->user()->id);
        })->findOrFail($id);
        
        foreach($session->questions as $question){
            if($question->score==null)$question->score=0;
        }
        return $session;
    }
    public function saveScore(Request $request){
        $session = Session::with('user','questions.answer_lists', 'questions.answer',
            'questions.assigment_question_list.assigment_type:id,name,description')->whereHas('questions.assigment_question_list',
            function($q){
                $q->where('user_id','=',auth('api')->user()->id);
        })->findOrFail($request->id);

        //return $session;

        $total_score = 0;
        foreach($request["questions"] as $key=>$question){
            if($question['assigment_question_list']['assigment_type']['description']=="selectoptions" && $question['answer']['value']==100){
            // cari di table questions
               $masterQuestion = $session->questions()->find($question['id']);
               $masterQuestion->score=100;
               $masterQuestion->save();
               $total_score += 100;
        
            }else if($question['assigment_question_list']['assigment_type']['description']!="selectoptions" && $question['score']!=null){
                
                $score = intval($question['score']);
                if($score>=0 && $score<=100){
                    // cari di table questions
                    $masterQuestion = $session->questions()->find($question['id']);
                    $masterQuestion->score=$question['score'];
                    $total_score += $question['score'];
                    $masterQuestion->save();
                }else{
                    return response()->json(['error'=>'Rentang nilai harus di antara 0-100']);
                }
            }
        }
        
        $assigment_session = $session->assigment_session;
        $assigment_session->total_score=round(($total_score/(100*count($request['questions'])))*100,2);
        $assigment_session->save();

        $assigment_session->total_score=round($assigment_session->total_score, 2);
        // $request['assigment_session'] = $assigment_session;
        $session = Session::with('user','questions.answer','assigments')->findOrFail($request->id);
        return $session;
    }
}
