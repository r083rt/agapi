<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
