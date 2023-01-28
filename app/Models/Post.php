<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use SoftDeletes;
    //
    const PUBLISHED = 'PUBLISHED';
    // protected $guarded = ["id"];
    protected $fillable = ['author_id', 'category_id', 'title', 'seo_title', 'excerpt', 'body', 'image', 'slug', 'meta_description', 'meta_keywords', 'status', 'featured', 'is_public'];

    protected $appends = ['is_liked', 'is_bookmarked', 'likes_count', 'comments_count', 'read_count', 'thumbnail'];

    public function authorId()
    {
        return $this->belongsTo('App\Models\User', 'author_id', 'id');
    }

    public function author()
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

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', 'PUBLISHED');
    }

    public function comments_from_other()
    {
        return $this->morphMany('App\Models\Comment', 'comment')->where('user_id', '!=', auth('api')->user() ? auth('api')->user()->id : -1);
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'comment');
    }

    public function reports()
    {
        return $this->morphMany('App\Models\Report', 'report');
    }

    public function user_reports()
    {
        return $this->morphToMany('App\Models\User', 'report');
    }

    public function auth_user_reports()
    {
        return $this->morphToMany('App\Models\User', 'report')->wherePivot('user_id', '=', auth('api')->user()->id);
    }

    //siapa aja users yang membaca post
    public function readers()
    {
        return $this->morphToMany('App\Models\User', 'read');
    }

    //count readers post
    public function getReadCountAttribute()
    {
        return $this->readers()->count();
    }

    public function auth_read()
    {
        return $this->morphToMany('App\Models\User', 'read')->wherePivot('user_id', '=', auth('api')->user()->id);
    }

    public function likes()
    {
        return $this->morphMany('App\Models\Like', 'like');
    }

    public function last_like()
    {
        return $this->morphOne('App\Models\Like', 'like')->latest();
    }

    public function last_comment()
    {
        return $this->morphOne('App\Models\Comment', 'comment')->latest();
    }

    public function liked()
    {
        $user = auth('api')->user();
        return $this->morphOne('App\Models\Like', 'like')->where('user_id', $user ? $user->id : 0);
    }

    public function bookmarked()
    {
        $user = auth('api')->user();
        return $this->morphOne('App\Models\Bookmark', 'bookmark')->where('user_id', $user ? $user->id : 0);
    }

    public function bookmarks()
    {
        return $this->morphMany('App\Models\Bookmark', 'bookmark');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function files()
    {
        return $this->morphMany('App\Models\File', 'file');
    }

    public function documents()
    {
        return $this->morphMany('App\Models\File', 'file');
    }

    public function meeting_rooms()
    {
        return $this->belongsToMany('App\Models\Room', 'room_posts')->where('rooms.type', 'meeting');
    }

    public function events()
    {
        return $this->belongsToMany('App\Models\Event', 'event_posts');
    }

    public function images()
    {
        return $this->morphMany('App\Models\File', 'file')->whereIn('type', ['image/jpeg', 'image/png', 'image/gif', 'image/jpg']);
    }

    public function videos()
    {
        return $this->morphMany('App\Models\File', 'file')->whereIn('type', ['video/mp4', 'video/ogg', 'video/webm']);
    }

    public function audios()
    {
        return $this->morphMany('App\Models\File', 'file')->whereIn('type', ['audio/mpeg', 'audio/ogg', 'audio/wav']);
    }

    public function docs()
    {
        return $this->morphMany('App\Models\File', 'file')->whereIn('type', ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
    }

    public function ads()
    {
        return $this->morphMany('App\Models\Ad', 'adable');
    }

    public function media()
    {
        return $this->morphMany('App\Models\File', 'file')->whereIn('type', ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'video/mp4', 'video/ogg', 'video/webm']);
    }

    // accessor -----------------------------------------------------------------------------------------
    public function getIsLikedAttribute()
    {
        $user = auth('api')->user();
        return $this->liked()->where('user_id', $user ? $user->id : 0)->exists();
    }

    public function getIsBookmarkedAttribute()
    {
        $user = auth('api')->user();
        return $this->bookmarked()->where('user_id', $user ? $user->id : 0)->exists();
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function getCommentsCountAttribute()
    {
        return $this->comments()->count();
    }

    public function getThumbnailAttribute()
    {
        if ($this->media()->count() == 0) {
            return null;
        }
        $media = $this->media()->first();
        if ($media->type == 'image/jpeg' || $media->type == 'image/png' || $media->type == 'image/gif' || $media->type == 'image/jpg') {
            return $media->src;
        }
        if ($media->type == 'video/mp4' || $media->type == 'video/ogg' || $media->type == 'video/webm') {
            return $media->thumbnail->src;
        }
        return null;
    }
}
