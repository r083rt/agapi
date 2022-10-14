<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushToken extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function users()
    {
        return $this->belongsToMany('App\Models\Member\User', 'user_push_tokens', 'push_token_id', 'user_id');
    }
}
