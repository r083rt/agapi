<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    //
    const PUBLISHED = 'PUBLISHED';
    // protected $guarded = ["id"];
    protected $fillable = ['author_id','category_id','title','seo_title','excerpt','body','image','slug','meta_description','meta_keywords','status','featured', 'is_public'];

    public function authorId()
    {
        return $this->belongsTo('App\Models\User', 'author_id', 'id');
    }

    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->author_id && app('VoyagerAuth')->user()) {
            $this->author_id = app('VoyagerAuth')->user()->getKey();
        }

        parent::save();
    }
    public function user(){
        return $this->belongsTo('App\Models\User','author_id');
    }
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', 'PUBLISHED');
    }

    // public function comments()
    // {
    //     return $this->belongsToMany('App\Models\Comment', 'App\Models\PostComment')->withPivot('created_at')->withTimestamps();
    // }
    public function comments_from_other(){
        return $this->morphMany('App\Models\Comment','comment')->where('user_id','!=',auth('api')->user()?auth('api')->user()->id:-1);
    }
    public function comments(){
        return $this->morphMany('App\Models\Comment','comment');
    }
    public function reports()
    {
        return $this->morphMany('App\Models\Report','report');
    }
    public function user_reports()
    {
        return $this->morphToMany('App\Models\User','report');
    }
    public function auth_user_reports()
    {
        return $this->morphToMany('App\Models\User','report')->wherePivot('user_id','=',auth('api')->user()->id);;
    }

    //siapa aja users yang membaca post
    public function readers(){
        return $this->morphToMany('App\Models\User','read');
    }
    public function auth_read(){
        return $this->morphToMany('App\Models\User','read')->wherePivot('user_id','=',auth('api')->user()->id);
    }

    // public function likes()
    // {
    //     return $this->belongsToMany('App\Models\Like', 'App\Models\PostLike')->withPivot('created_at')->withTimestamps();
    // }

    public function likes(){
        return $this->morphMany('App\Models\Like','like');
    }

    // public function liked()
    // {
    //     return $this->belongsToMany('App\Models\Like', 'App\Models\PostLike')->withPivot('created_at')->withTimestamps()->where('user_id', Auth::user()->id);
    // }

    public function liked(){
        //return $this->morphOne('App\Models\Like','like')->where('user_id', Auth::check() ? Auth::user()->id : 0);
        $user=auth('api')->user();
        return $this->morphOne('App\Models\Like','like')->where('user_id', $user?$user->id:0);

    }

    public function bookmarked(){
        //return $this->morphOne('App\Models\Bookmark','bookmark')->where('user_id',Auth::check() ? Auth::user()->id : 0);
        $user=auth('api')->user();
        return $this->morphOne('App\Models\Bookmark','bookmark')->where('user_id', $user?$user->id:0);
    }

    public function bookmarks(){
        return $this->morphMany('App\Models\Bookmark','bookmark');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function files(){
        return $this->morphMany('App\Models\File','file');
    }

    public function ads(){
        return $this->morphMany('App\Models\Ad','ad');
    }
    public function documents(){
        return $this->morphMany('App\Models\File','file');
    }
}
