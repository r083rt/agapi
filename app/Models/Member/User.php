<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function conversations()
    // {
    //     return $this->hasMany('App\Models\Member\Conversation', 'creator_id');
    // }

    // public function conversation()
    // {
    //     return $this->hasOne('App\Models\Member\Conversation', 'creator_id');
    // }

    public function profile()
    {
        return $this->hasOne('App\Models\Member\Profile', 'user_id');
    }

    public function conversations()
    {
        return $this->belongsToMany('App\Models\Member\Conversation', 'user_conversations', 'user_id', 'conversation_id');
    }
}
