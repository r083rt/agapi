<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSession extends Model
{
    use HasFactory;
    protected $table = 'event_session';

    protected $fillable = ['event_id','session_no', 'session_name', 'session_time'];

    public function presents()
    {
        return $this->hasOne(EventPresents::class, 'session_id', 'id');
    }

 
}
