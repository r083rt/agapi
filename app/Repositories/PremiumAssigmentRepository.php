<?php 
namespace App\Repositories;
use App\Interfaces\AssigmentRepository;
use App\Models\Assigment;
use Illuminate\Database\Eloquent\Builder;
use DB;

class PremiumAssigmentRepository implements AssigmentRepository{

    public function findOrFail($id){
        $assigment = Assigment::with(['question_lists'=>function($query){
            // hanya mengambil queston_lists yang master'nya (ref_id) berbayar (is_paid=1)
            // $query->where('question_lists.is_paid', true)
            $query->whereExists(function($query2){
                $query2->select(DB::raw(1))
                ->from('question_lists as master_question_list')
                ->whereColumn('master_question_list.id','=','question_lists.ref_id')
                ->where('master_question_list.is_paid',1);
            });
            
        }]) 
        ->where('is_paid','>=',1)->findOrFail($id);
        return $assigment;
    }

}