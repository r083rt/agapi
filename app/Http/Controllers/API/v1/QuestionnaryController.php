<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Questionnary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionnaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Questionnary::with('question_lists.answer_lists')->whereDoesntHave('sessions',function($query){
            $query->where('user_id','=',auth('api')->user()->id);
        })->where('is_active', true)->whereDate('start_at','>=',\Carbon\Carbon::today()->toDateString())->whereDate('end_at','<=',\Carbon\Carbon::today()->toDateString())->get();
        //$res->question_lists()->load('answer_lists');
        return $res;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$sess
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

    public function getactive(){
        // $res = Questionnary::where('is_active',true)->get();
        // return response()->json($res);
        $user = auth('api')->user();
        if(!$user)return response()->json([]);
        else if(!$user->user_activated_at)response()->json([]);
        
        $res = \App\Models\Questionnary::with('question_lists.answer_lists')->whereDoesntHave('sessions',function($query){
            $query->where('user_id','=',auth('api')->user()->id);
        })->where('is_active', true)->whereDate('end_at','>=',\Carbon\Carbon::today()->toDateString())->whereDate('start_at','<=',\Carbon\Carbon::today()->toDateString())->get();
        //$res->question_lists()->load('answer_lists');
        return $res;
    }
    public function getreport(){
        // return \App\Models\QuestionList::with(['answer_lists'=>function($query){
        //     $query->withCount('answers');
        // }])->has('answer_lists')->whereHas('questionnaries',function($query){
        //  $query->where('questionnary_id','=',1);
        // })->get();  
    }
}
