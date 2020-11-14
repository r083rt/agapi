<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonPlanContent extends Model
{
    //
    // protected $guarded = ["id"];
    protected $fillable = ["name","value"];
}
