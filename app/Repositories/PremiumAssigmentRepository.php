<?php 
namespace App\Repositories;
use App\Interfaces\AssigmentRepository;
use App\Models\Assigment;
use Illuminate\Database\Eloquent\Builder;
class PremiumAssigmentRepository implements AssigmentRepository{

    public function findOrFail($id){
        $assigment = Assigment::with(['question_lists'=>function($query){
            // hanya mengambil queston_lists yg berbayar (is_paid=1)
            $query->where('question_lists.is_paid', true);
        }]) 
        ->where('is_paid','>=',1)->findOrFail($id);
        return $assigment;
    }

}