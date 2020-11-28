<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LessonPlan extends Model
{
    //
    // protected $guarded = ["id"];
    protected $fillable = ["user_id",'creator_id','image','topic','school','subject','grade_id','duration','effort','lesson_plan_cover_id','description','is_lock'];

    public function contents(){
        return $this->hasMany('App\Models\LessonPlanContent');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function grade(){
        return $this->belongsTo('App\Models\Grade');
    }

    public function comments(){
        //return $this->belongsToMany('App\Models\Comment','lesson_plan_comments','lesson_plan_id','comment_id');
        return $this->morphMany('App\Models\Comment','comment');

    }

    public function reviews(){
        //return $this->belongsToMany('App\Models\Review','lesson_plan_reviews','lesson_plan_id','review_id');
        return $this->morphMany('App\Models\Review','review');
    }
    public function likes(){
        //return $this->belongsToMany('App\Models\Like','lesson_plan_likes');
        return $this->morphMany('App\Models\Like','like');
    }

    public function liked(){
        //return $this->belongsToMany('App\Models\Like','lesson_plan_likes')->where('user_id', Auth::user()->id);
        return $this->morphOne('App\Models\Like','like')->where('user_id', Auth::check() ? Auth::user()->id : 0);

    }

    public function ratings(){
        //return $this->belongsToMany('App\Models\Rating','lesson_plan_ratings');
        return $this->morphMany('App\Models\Rating','rating');
    }

    public function rated(){
        //return $this->belongsToMany('App\Models\Rating','lesson_plan_ratings')->where('user_id', Auth::user()->id);
        return $this->morphOne('App\Models\Rating','rating')->where('user_id', Auth::check() ? Auth::user()->id : 0);
    }

    public function cover(){
        return $this->belongsTo('App\Models\LessonPlanCover','lesson_plan_cover_id','id');
    }
    public function template(){
        return $this->morphOne('App\Models\Template','template');
    }
    public function lesson_plan_cover(){
        return $this->belongsTo('App\Models\LessonPlanCover');
    }
}
