<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonPlanLike extends Model
{
    //
    protected $fillable = ['lesson_plan_id','like_id'];

    public function like(){
        return $this->belongsTo('App\Models\Like');
    }
}
