<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function event_guests()
    {
        return $this->hasMany('App\Models\EventGuest');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'event_guests')->withPivot('created_at')->withTimestamps()->orderBy('created_at', 'desc');
    }
}
