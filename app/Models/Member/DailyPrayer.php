<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyPrayer extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function audio()
    {
        return $this->morphOne('App\Models\File', 'file');
    }
}
