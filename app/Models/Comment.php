<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    //
    protected $fillable = ["user_id", "value"];
    protected $appends = ["is_liked", "likes_count"];

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

    public function author()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function lesson_plans(){
        return $this->belongsToMany('App\Models\LessonPlan','lesson_plan_comments');
    }

    public function commentable(){
        return $this->morphTo(__FUNCTION__,'comment_type','comment_id');
    }

    // accessors
    public function getIsLikedAttribute()
    {
        return $this->liked()->exists();
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }
}
