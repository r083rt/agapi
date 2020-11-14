<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = ['question_id','answer_list_id','name','value'];

    public function question(){
        return $this->belongsTo('App\Models\Question');
    }
    // public function session(){
    //     return $this->hasOneThrough('App\Models\Session','App\Models\Question');
    // }
}
