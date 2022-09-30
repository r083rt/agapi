<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function conversations()
    {
        return $this->hasMany('App\Models\Member\Conversation', 'creator_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Member\Profile', 'user_id');
    }
}
