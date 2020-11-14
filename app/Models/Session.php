<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $fillable = ['user_id','value'];

    public function sessionable(){
        return $this->morphTo();
    }

    // public function assigment(){
    //     return $this->belongsTo('App\Models\Assigment','session_id');
    // }

    public function assigments(){
        return $this->belongsToMany('App\Models\Assigment','assigment_sessions')->withPivot('total_score','user_id');
    }
    // public function finished_assigments(){
    //     return $this->belongsToMany('App\Models\Assigment','assigment_sessions','session_id','assigment_id')->withPivot('total_score','user_id')->wherePivot('total_score',100);
    // }
    public function questions(){
        return $this->hasMany('App\Models\Question');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function assigment_session(){
        return $this->hasOne('App\Models\AssigmentSession');
    }
    public function questionnaries(){
        return $this->belongsToMany('App\Models\Questionnary','questionnary_sessions');//->withPivot('total_score','user_id'); 
    }
}
