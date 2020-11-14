<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnary extends Model
{
    protected $fillable = [
        'user_id','name', 'description','is_active','start_at','end_at'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    // public function question_lists(){
    //     return $this->belongsToMany('App\Models\QuestionList','App\Models\QuestionnaryQuestionList');//->withPivot('creator_id','user_id','assigment_type_id');
    // }
    public function question_lists(){
        return $this->belongsToMany('App\Models\QuestionList','App\Models\QuestionnaryQuestionList')->whereHas('answer_lists');
    }
    // public function question_lists2(){
    //     return $this->belongsToMany('App\Models\QuestionList','App\Models\QuestionnaryQuestionList');
    // }
    public function sessions(){
        return $this->belongsToMany('App\Models\Session','questionnary_sessions');//->withPivot('total_score','user_id');
    }
}
