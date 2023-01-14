<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class UserConversation extends Model
{
    use HasFactory, SoftDeletes;
}
