<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    //

    public function channels(){
        return $this->belongsToMany('App\Models\Channel','chat_channels');
    }

    public function main_users(){
        return $this->belongsToMany('App\Models\User','main_chats');
    }
}
