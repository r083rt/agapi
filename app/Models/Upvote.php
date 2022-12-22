<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function upvoteable(){
        return $this->morphTo();
    }
}
