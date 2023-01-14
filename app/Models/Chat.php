<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use HasFactory, softDeletes;
    public function channels()
    {
        return $this->belongsToMany('App\Models\Channel', 'chat_channels');
    }

    public function main_users()
    {
        return $this->belongsToMany('App\Models\User', 'main_chats');
    }
}
