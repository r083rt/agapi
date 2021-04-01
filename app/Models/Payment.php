<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function payment_vendor(){
        return $this->belongsTo('App\Models\PaymentVendor','payment_vendor_id','id');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User','payment_id','id');
    }

    /**
     * Set status to Pending
     *
     * @return void
     */
    public function setPending()
    {
        if($this->attributes['status'] != 'success'){
            $this->attributes['status'] = 'pending';
            self::save();
        }
    }

    /**
     * Set status to Success
     *
     * @return void
     */
    public function setSuccess($unix_timestamp)
    {

        $this->attributes['status'] = 'success';
        $date = date('Y-m-d H:i:s', $unix_timestamp);
        $user = $this->user()->update(['user_activated_at'=>$date]);
        self::save();
    }

    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setFailed()
    {
        if($this->attributes['status'] != 'success'){
            $this->attributes['status'] = 'failed';
            self::save();
        }
    }

    /**
     * Set status to Expired
     *
     * @return void
     */
    public function setExpired()
    {
        if($this->attributes['status'] != 'success'){
            $this->attributes['status'] = 'expired';
            self::delete();
        }
    }

    public function necessary(){
        return $this->belongsTo('App\Models\Necessary');
    }

}
