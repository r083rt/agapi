<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
  public function ad_targets(){
      return $this->hasMany(AdTarget::class);
  }
}
