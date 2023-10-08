<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPresents extends Model
{
    use HasFactory;
    protected $table = 'event_presents';

    protected $fillable = ['session_id','event_id','user_id', 'present_time',];

    public function eventSession()
    {
        return $this->belongsTo(EventSession::class, 'session_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo(EventSession::class, 'event_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
