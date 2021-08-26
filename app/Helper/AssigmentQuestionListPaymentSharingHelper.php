<?php 
namespace App\Helper;
use App\Models\PurchasedItem;
use App\Models\PaymentSharing;
use App\Models\Assigment;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use DB;

class AssigmentQuestionListPaymentSharingHelper{

    public $buyer_user_id=null;
    public $assigment;
    public function __construct(Assigment $assigment){
        $this->assigment = $assigment;
    }
    public function sharingFrom($payment_out){
        if($payment_out->type!=='OUT')throw new \Exception("parameter Payment harus mempunyai type OUT");

         // butir soal premium
         $paid_question_lists  = [];
         foreach($this->assigment->question_lists as $question_list){
             $paid_question_lists[] = ['user_id'=>$question_list->pivot->creator_id, 'question_list_id'=>$question_list->id];
             // $paid_question_lists_user_ids[] = $question_list->pivot->creator_id;
         }

        //bagi keuntungan
        $db_necessaries = DB::table('necessaries')->get();
        $db_necessaries_key_based = [];
        foreach($db_necessaries as $db_necessary){
            $db_necessaries_key_based[$db_necessary->name] = $db_necessary;
        }
        $db_users = DB::table('users')->whereIn('email',['admin@admin.com', 'dpp@dpp','dana_simpan@dana_simpan'])->get();
        $db_users_key_based = [];
        foreach($db_users as $db_user){
            $db_users_key_based[$db_user->email] = $db_user;
        }
        
        $payments_in_to = $payment_out->generateSharingPayments([
            ['necessary_id'=>$db_necessaries_key_based['bagi_ardata']->id,
            'user_id'=>$db_users_key_based['admin@admin.com']->id,
            'percentage'=>0.3
            ],

            ['necessary_id'=>$db_necessaries_key_based['bagi_dpp']->id,
            'user_id'=>$db_users_key_based['dpp@dpp']->id,
            'percentage'=>0.3
            ],

            ['necessary_id'=>$db_necessaries_key_based['dana_simpan']->id,
            'user_id'=>$db_users_key_based['dana_simpan@dana_simpan']->id,
            'percentage'=>0.1
            ],
            
            ['necessary_id'=>$db_necessaries_key_based['bagi_guru_paket_soal']->id,
            'user_id'=>$this->assigment->user_id,
            'percentage'=>0.3,
            'sharings'=>  count($paid_question_lists)?
                [
                    [ 'necessary_id'=>$db_necessaries_key_based['bagi_guru_butir_soal']->id,
                    'user_id'=>$paid_question_lists]
                ]:null,
            ],
          
            
        ]);

        // insert sharing payments
        $sharing_payment_repo = new \App\Helper\SharingPaymentHelper;
        $sharing_payment_repo->payment_from = $payment_out;
        $sharing_payment_repo->payments_to = $payments_in_to;
        $sharing_payment_repo->additional_attiributes = ['question_list_id'];
        $payment_sharings = $sharing_payment_repo->save();
        

        // masukkan premium assigment yang dibeli ke purchased_item
        // jika sudah ada, tidak usah dimasukkan
        $purchased_item = new \App\Models\PurchasedItem;
        $purchased_item->payment_id = $payment_out->id;

        // jika buyer_user_id tidak kosong, lakukan pengecekan
        if($this->buyer_user_id){
            $exists = $this->assigment->whereHas('purchased_items', function($query){
                $query->whereHas('payment', function($query2){
                    $query2->where('payments.payment_type',\App\Models\User::class)
                    ->where('payments.payment_id', $this->buyer_user_id);
                });
            })->exists();

            if(!$exists){
                $this->assigment->purchased_items()->save($purchased_item);
            }
        }else{
            $this->assigment->purchased_items()->save($purchased_item);
        }
      

        

        // masukkan premium butir soal/question_list ke purchased_item
        $payment_sharing_question_list_ids = [];
        foreach($payment_sharings as $payment_sharing){
            if(isset($payment_sharing->question_list_id)){
                $payment_sharing_question_list_ids[] = ['question_list_id'=>$payment_sharing->question_list_id, 'payment_id'=>$payment_sharing->payment_to];
            }
        }
        $purchased_question_list_repo = new \App\Helper\PurchasedQuestionListHelper;
        $purchased_question_list_repo->save($payment_sharing_question_list_ids);
        return $sharing_payment_repo;
    }
}