<?php

namespace App\Http\Controllers;

use App\Models\Questionnary;
use Illuminate\Http\Request;

class QuestionnaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.questionnary.index',['auth'=>auth()->user(), 'educational_levels'=>\App\Models\EducationalLevel::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $questionnary = new Questionnary;
        $questionnary->fill($request->toArray());
        $questionnary->user_id=$request->user()->id;
        $questionnary->save();
        $question_list_db_ids=[];
        foreach($request->question_lists as $question_list){
            //return $question_list;
            $question_list_db = new \App\Models\QuestionList;
            $question_list_db->fill($question_list);
            $question_list_db->save();
            foreach($question_list['answer_lists'] as $answer_list){
                $answer_list_db = new \App\Models\AnswerList;
                $answer_list_db->fill($answer_list);
                $question_list_db->answer_lists()->save($answer_list_db);
            }
            array_push($question_list_db_ids,$question_list_db->id);
         
            //return \App\Models\QuestionList::with('answer_lists')->find($question_list_db->id);
        }
        $now=date('Y-m-d H:i:s');
        return $questionnary->question_lists()->sync($question_list_db_ids,['created_at'=>$now,'updated_at'=>$now]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionnary  $questionnary
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnary $questionnary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionnary  $questionnary
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnary $questionnary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionnary  $questionnary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnary $questionnary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionnary  $questionnary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnary $questionnary)
    {
        //
    }
}
