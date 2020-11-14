<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['session_id','question_list_id','name','description','score'];

    public function answer(){
        return $this->hasOne('App\Models\Answer');
    }
    public function answer_lists(){
        return $this->hasMany('App\Models\AnswerList','question_list_id','question_list_id');
    }
    public function assigment_types(){
        return $this->belongsToMany('App\Models\AssigmentType','assigment_question_lists','question_list_id','assigment_type_id');
    }
    public function assigment_question_list(){
        return $this->hasOne('App\Models\AssigmentQuestionList','question_list_id','question_list_id');
    }
    public function session(){
        return $this->belongsTo('App\Models\Session');
    }
    
}
