<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPushToken extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
}
