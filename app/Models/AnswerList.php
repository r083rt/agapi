<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerList extends Model
{
    //
    protected $fillable = ['name','value'];

    public function files(){
        return $this->morphMany('App\Models\File','file');
    }
    public function answers(){
        return $this->hasMany('App\Models\Answer');
    }
    public function answer_list_type(){
        return $this->belongsTo(\App\Models\AnswerListType::class);
    }
    public function images(){
        return $this->morphMany(\App\Models\File::class,'file')->where('type', 'LIKE','image%');
    }
 
}
