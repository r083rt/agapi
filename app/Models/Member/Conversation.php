<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function creator()
    {
        return $this->belongsTo('App\Models\Member\User', 'creator_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\Member\User', 'user_conversations', 'conversation_id', 'user_id');
    }

    public function chats()
    {
        return $this->hasMany('App\Models\Member\Chat', 'conversation_id');
    }

    public function last_chat()
    {
        return $this->hasOne('App\Models\Member\Chat', 'conversation_id')->latest();
    }
}
