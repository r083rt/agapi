<?php 
namespace App\Repositories;
use App\Interfaces\PurchasedItemRepository;
use App\Models\PurchasedItem;
use App\Models\QuestionList;
use DB;

class PurchasedQuestionListRepository{
    public $question_lists;
    public $payments;

    public function save($data){
        $now = \Carbon\Carbon::now();
        $inserts = [];
        foreach($data as $row){
            $inserts[] = ['purchased_item_type'=>QuestionList::class,
            'purchased_item_id'=>$row['question_list_id'],
            'payment_id'=>$row['payment_id'],
            'created_at'=>$now,
            'updated_at'=>$now];
        }
        return DB::table('purchased_items')->insert($inserts);
    }
}