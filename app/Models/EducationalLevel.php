<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalLevel extends Model
{
    //
    protected $guarded = ['id'];

    public function lesson_plan_formats()
    {
        return $this->hasMany('App\Models\LessonPlanFormat');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Grade');
    }

    public function lesson_plans(){
        return $this->hasManyThrough('App\Models\LessonPlan','App\Models\Grade');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User','profiles');
    }
}
