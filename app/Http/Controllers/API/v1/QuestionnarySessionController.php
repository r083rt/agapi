<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionnarySession;
use App\Models\Questionnary;

class QuestionnarySessionController extends Controller
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
       //return $request['id'];
        // $request->validate([
        //     '*.qu'
        // ]);
        $quesionnary = Questionnary::findOrFail($request['id']);

        $session = new \App\Models\Session;
        $session->user_id = $request->user()->id;
        $session->save();
        $session->questionnaries()->sync($quesionnary->id);
        //$session
        //return $session;
       
        foreach($request['question_lists'] as $key=>$question_list){
            $question = new \App\Models\Question();
            $question->name = $question_list['name'];
            $question->session_id = $session->id;
            
            $question_list_db = \App\Models\QuestionList::findOrFail($question_list['id']);
            $question->question_list_id = $question_list_db->id;
            $question->save();

            $answer_list_db = \App\Models\AnswerList::findOrFail($question_list['answer_id']);
            
            $answer = new \App\Models\Answer($question->toArray());
            $answer->name=$answer_list_db->name;
            $answer->answer_list_id = $answer_list_db->id;
            $question->answer()->save($answer);
            //return $answer;
           
           
            
        }
        $user =  auth('api')->user();
        if($user->user_activated_at!=null){
            $user->user_activated_at =  date('Y-m-d H:i:s', strtotime($user->user_activated_at. ' + 30 days'));
            //return $user;
            $user->save();
        }
        return $session;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return
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
