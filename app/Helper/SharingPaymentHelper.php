<?php 
namespace App\Helper;
use App\Models\PurchasedItem;
use App\Models\PaymentSharing;
use App\Models\Assigment;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use DB;

class SharingPaymentHelper{
    public $payment_from;
    public $payments_to;
    public $additional_attiributes = [];
    public function save(){
        $payment_sharings = [];
        foreach($this->payments_to as $payment_to){
            $payment_in = new Payment;
            $payment_in->type =  $payment_to['type'];
            $payment_in->status = $payment_to['status'];
            $payment_in->payment_id = $payment_to['payment_id'];
            $payment_in->necessary_id = $payment_to['necessary_id'];
            $payment_in->payment_type = $payment_to['payment_type'];
            $payment_in->created_at = $payment_to['created_at'];
            $payment_in->updated_at = $payment_to['updated_at'];
            $payment_in->value = $payment_to['value'];
            $payment_in->save();

            $payment_sharing = new PaymentSharing;
            $payment_sharing->payment_from = $this->payment_from->id;
            $payment_sharing->payment_to = $payment_in->id;
            $payment_sharing->save();

            foreach($this->additional_attiributes as $additional_attiribute){
                if(isset($payment_to[$additional_attiribute])){
                    $payment_sharing->{$additional_attiribute} = $payment_to[$additional_attiribute];
                }   
            }
            $payment_sharings[] = $payment_sharing;
                      
        }

        return $payment_sharings;
    }

    
   
}