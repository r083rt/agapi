<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    //
    protected $fillable = ["user_id", "value"];

    // public function likes()
    // {
    //     return $this->belongsToMany('App\Models\Like', 'App\Models\CommentLike')->withPivot('created_at')->withTimestamps();
    // }

    public function likes(){
        return $this->morphMany('App\Models\Like','like');
    }

    // public function liked()
    // {
    //     return $this->belongsToMany('App\Models\Like', 'App\Models\CommentLike')->withPivot('created_at')->withTimestamps()->where('user_id', Auth::user()->id);
    // }

    public function liked(){
        return $this->morphOne('App\Models\Like','like')->where('user_id', Auth::check() ? Auth::user()->id : 0);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function lesson_plans(){
        return $this->belongsToMany('App\Models\LessonPlan','lesson_plan_comments');
    }
    public function commentable(){
        return $this->morphTo(__FUNCTION__,'comment_type','comment_id');
    }
}
