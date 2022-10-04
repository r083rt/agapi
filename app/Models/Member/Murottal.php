<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murottal extends Model
{
    use HasFactory;

    public function audio()
    {
        return $this->morphOne('App\Models\Member\File', 'file');
    }
}
