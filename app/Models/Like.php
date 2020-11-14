<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // public function lesson_plan_likes(){
    //     return $this->hasMany('App\Models\LessonPlanLike');
    // }
    public function likeable(){
         return $this->morphTo(__FUNCTION__,'like_type','like_id');
    }

}
