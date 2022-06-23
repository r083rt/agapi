<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function payment_vendor()
    {
        return $this->belongsTo('App\Models\PaymentVendor', 'payment_vendor_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');

    }

    public function buyer()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event', 'payment_id', 'id')->where('payment_type', 'App\Models\Event');
    }

    /**
     * Set status to Pending
     *
     * @return void
     */
    public function setPending()
    {
        if ($this->attributes['status'] != 'success') {
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
        $user = $this->user()->update([
            'user_activated_at' => $date,
            'expired_at' => date('Y-m-d H:i:s', strtotime($date . ' +6 months')),
        ]);
        self::save();
    }

    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setFailed()
    {
        if ($this->attributes['status'] != 'success') {
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
        if ($this->attributes['status'] != 'success') {
            $this->attributes['status'] = 'expired';
            self::delete();
        }
    }

    public function necessary()
    {
        return $this->belongsTo('App\Models\Necessary');
    }

    public function purchased_item()
    {
        return $this->hasOne(PurchasedItem::class);
    }

    public function paymentable()
    {
        return $this->morphTo(__FUNCTION__, 'payment_type', 'payment_id');
    }

    public function payment_sharings_to()
    {
        return $this->hasMany(PaymentSharing::class, 'payment_from');
    }
    public function payment_sharings_from()
    {
        return $this->hasMany(PaymentSharing::class, 'payment_to');
    }

    private function createNewPayment($payment_info, $percentage = null)
    {
        $now = \Carbon\Carbon::now();
        $new_payment = [];
        $new_payment['type'] = 'IN';
        $new_payment['status'] = 'success';
        $new_payment['necessary_id'] = $payment_info['necessary_id'];
        $new_payment['payment_id'] = $payment_info['user_id'];
        $new_payment['payment_type'] = User::class;
        $new_payment['created_at'] = $now;
        $new_payment['updated_at'] = $now;
        $new_payment['value'] = ($percentage ?? $payment_info['percentage']) * $this->value;
        return $new_payment;
    }
    // method bagi hasil
    public function generateSharingPayments($data, &$payments = [])
    {

        foreach ($data as $payment_info) {

            $is_sharing = false;

            // jika ada sharing maka $percentage dibagi 50/50
            if (isset($payment_info['sharings']) && is_array($payment_info['sharings'])) {
                $is_sharing = true;
                $payment_info['percentage'] = $payment_info['percentage'] / 2;
            }

            if (is_array($payment_info['user_id'])) {
                $percentage = $payment_info['percentage'] / count($payment_info['user_id']); //percentage dibagi jumlah user_id
                $user_ids = $payment_info['user_id'];
                // iterasi sebanyak jumlah $user_ids
                foreach ($user_ids as $key => $user_id) {
                    if (is_array($user_id)) {
                        $payment_info['user_id'] = $user_id['user_id'];
                    } else {
                        $payment_info['user_id'] = $user_id;
                    }

                    $new_payment = $this->createNewPayment($payment_info, $percentage);
                    // memasukkan kembali atribut lain ke new_payment
                    if (is_array($user_id)) {
                        $keys = array_keys($user_id);
                        foreach ($keys as $key) {
                            if ($key !== 'user_id') {
                                $new_payment[$key] = $user_id[$key];
                            }

                        }
                    }
                    $payments[] = $new_payment;
                }
            } else {
                $payments[] = $this->createNewPayment($payment_info);
            }

            if ($is_sharing) {
                $sharings_count = count($payment_info['sharings']);
                for ($i = 0; $i < $sharings_count; $i++) {
                    $payment_info['sharings'][$i]['percentage'] = $payment_info['percentage'];
                }
                $this->generateSharingPayments($payment_info['sharings'], $payments);
            }

        }
        return $payments;
    }

}
