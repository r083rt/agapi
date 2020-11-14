<?php

namespace App\Http\Controllers\API\v1;

use App\Models\AssigmentQuestionList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionList;
use App\Models\User;
use App\Models\AssigmentType;
use Illuminate\Support\Facades\Auth;

class AssigmentQuestionListController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssigmentQuestionList  $assigmentQuestionList
     * @return \Illuminate\Http\Response
     */
    public function show(AssigmentQuestionList $assigmentQuestionList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssigmentQuestionList  $assigmentQuestionList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssigmentQuestionList $assigmentQuestionList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssigmentQuestionList  $assigmentQuestionList
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssigmentQuestionList $assigmentQuestionList)
    {
        //
    }

    public function search($key){
        $question_lists = QuestionList::
        with('assigments','answer_lists')->
        whereHas('assigments')
        ->where('name','like','%'.$key.'%')
        ->whereHas('assigment_question_lists',function($query){
            $query->where('creator_id','!=',Auth::user()->id)->where('user_id','!=',Auth::user()->id);
        })
        ->limit(100)
        ->get();
        foreach ($question_lists as $ql => $question_list) {
            # code...
            foreach ($question_list['assigments'] as $a => $assigment) {
                # code...
                $assigment->pivot->user = User::find($assigment->pivot->user_id);
                $assigment->pivot->creator = User::find($assigment->pivot->creator_id);
                $assigment->pivot->assigment_type = AssigmentType::find($assigment->pivot->assigment_type_id);
            }
        }
        return response()->json($question_lists);
    }
}
