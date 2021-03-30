<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentVendor extends Model
{
    use HasFactory;

    public function payments(){
        return $this->hasMany('App\Models\Payment');
    }
}
