<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class IslamicStudy extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function category(){
        return $this->belongsTo(IslamicStudyCategory::class, 'islamic_study_category_id', 'id');
    }

    public function thumbnail(){
        return $this->morphOne(File::class, 'file')->where('key', 'thumbnail_islamic_study')->orderBy('id', 'desc');
    }

    public function content(){
        return $this->morphOne(File::class, 'file')->where('key', 'content_islamic_study')->orderBy('id', 'desc');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'like');
    }
    public function liked()
    {
        return $this->morphOne('App\Models\Like', 'like')->where('user_id', Auth::check() ? Auth::user()->id : 0);
    }
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'comment');
    }
}
