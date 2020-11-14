<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //
    protected $fillable = ['user_id','value'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function lesson_plan_ratings(){
        return $this->hasMany('App\Models\LessonPlanRating');
    }

    public function lesson_plans(){
        return $this->belongsToMany('App\Models\LessonPlan','lesson_plan_ratings');
    }
}
