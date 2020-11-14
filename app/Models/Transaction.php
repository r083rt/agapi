<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function payment(){
        return $this->morphOne('App\Models\Payment','payment');
    }
    public function bank_account_from(){
        return $this->belongsTo('App\Models\BankAccount','bank_account_from_id');
    }
    public function bank_account_to(){
        return $this->belongsTo('App\Models\BankAccount','bank_account_to_id');
    }
}
