<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['is_liked', 'is_bookmarked', 'likes_count', 'comments_count'];

    public function likes()
    {
        return $this->morphMany('App\Models\Member\Like', 'like');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Member\File', 'file')->whereIn('type', ['image/jpeg', 'image/png', 'image/gif', 'image/jpg']);
    }

    public function videos()
    {
        return $this->morphMany('App\Models\Member\File', 'file')->whereIn('type', ['video/mp4', 'video/ogg', 'video/webm']);
    }

    public function author()
    {
        return $this->belongsTo('App\Models\Member\User', 'author_id', 'id');
    }

    public function getIsLikedAttribute()
    {
        $user = auth('api')->user();
        return $this->morphOne('App\Models\Member\Like', 'like')->where('user_id', $user ? $user->id : 0)->exists();
    }

    public function getIsBookmarkedAttribute()
    {
        $user = auth('api')->user();
        return $this->morphOne('App\Models\Member\Bookmark', 'bookmark')->where('user_id', $user ? $user->id : 0)->exists();
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }
}
