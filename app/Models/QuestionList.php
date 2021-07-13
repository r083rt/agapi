<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionList extends Model
{
    //
    protected $fillable = ['name','description','ref_id'];

    public function answer_lists(){
        return $this->hasMany('App\Models\AnswerList');
    }

    public function assigments(){
        return $this->belongsToMany('App\Models\Assigment','App\Models\AssigmentQuestionList')->withPivot('creator_id','user_id','assigment_type_id');
    }
    public function assigment_question_lists(){
        return $this->hasMany('App\Models\AssigmentQuestionList');
    }
    public function assigment_question_list(){
        return $this->hasOne('App\Models\AssigmentQuestionList');
    }

    public function files(){
        return $this->morphMany('App\Models\File','file');
    }
    public function assigment_types(){
        return $this->belongsToMany('App\Models\AssigmentType','App\Models\AssigmentQuestionList','question_list_id','assigment_type_id');
    }
    public function questionnaries(){
        return $this->hasMany('App\Models\QuestionnaryQuestionList');
    }

    public function audio(){
        return $this->morphOne(\App\Models\File::class,'file')->where('type','audio/m4a');
    }
    public function images(){
        return $this->morphMany(\App\Models\File::class,'file')->where('type', 'LIKE','image%');
    }
    public function questions(){
        return $this->hasMany('App\Models\Question','question_list_id');
    }
   
    
    public function ref_question_list(){
        return $this->belongsTo(QuestionList::class, 'ref_id');
    }
    // public function a(){
    //     return $this->has
    // }

}
