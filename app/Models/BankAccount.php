<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = ['user_id','name','account_number','bank_name'];

    public function bank_account_owner(){
        return  $this->morphTo(__FUNCTION__, 'bank_account_type', 'bank_account_id');
    }
}
