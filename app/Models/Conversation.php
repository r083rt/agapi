<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(\App\Models\User::class,'user_conversations')->orderBy('id','asc')->withPivot('is_admin','is_archived','is_muted','is_accepted')->withTimestamps();
    }
    public function participants(){
        return $this->users();
    }
    public function pending_or_accepted_users(){
        return $this->belongsToMany(\App\Models\User::class,'user_conversations')->orderBy('id','asc')->withPivot('is_admin','is_archived','is_muted','is_accepted')->wherePivotIn('is_accepted',[null,true])->withTimestamps();
    }
}
