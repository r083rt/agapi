<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonPlanGuidedUser extends Model
{
    //

    public function parent(){
        return $this->belongsTo('App\Models\User','parent_id','id');
    }

    public function child(){
        return $this->belongsTo('App\Models\User','child_id','id');
    }
}
