<?php 
namespace App\Helper;
use App\Interfaces\PurchasedItemRepository;
use App\Models\PurchasedItem;
use App\Models\Assigment;
use Illuminate\Database\Eloquent\Builder;

class PurchasedAssigmentItemHelper implements PurchasedItemRepository{
    public $assigment_id;
    public $user_id;
    public function isExists(){
        $purchased = PurchasedItem::whereHas('payment', function(Builder $query){
            $query->whereHasMorph('paymentable', \App\Models\User::class, function(Builder $query2){
                $query2->where('users.id', $this->user_id);
            });
        })->whereHasMorph('purchased_item',
         Assigment::class, function (Builder $query, $type){
             $query->where('assigments.id', $this->assigment_id);
         });
         return $purchased->exists();
    }

    public function save(){
        
    }
}