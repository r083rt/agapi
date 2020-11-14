<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonPlanRating extends Model
{
    //

    public function rating(){
        return $this->belongsTo('App\Models\Rating');
    }

    public function lesson_plan(){
        return $this->belongsTo('App\Models\Lessonplan');
    }
}
