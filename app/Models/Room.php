<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_rooms', 'room_id', 'user_id')->withPivot('is_admin');
    }

    public function non_admin_users()
    {
        return $this->belongsToMany('App\Models\User', 'user_rooms', 'room_id', 'user_id')->withPivot('is_admin')->wherePivot('is_admin', false);
    }

    public function admin_users()
    {
        return $this->belongsToMany('App\Models\User', 'user_rooms', 'room_id', 'user_id')->withPivot('is_admin')->wherePivot('is_admin', true);
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
