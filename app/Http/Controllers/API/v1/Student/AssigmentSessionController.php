<?php

namespace App\Http\Controllers\API\v1\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;
use App\Models\AssigmentSession;
use App\Models\Session;
use DB;
use Carbon\Carbon;

class AssigmentSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 111;
    }
    function checkIsSame($a, $b){
        if(count($a)!==count($b))return false;
        sort($a);
        sort($b);
        foreach($a as $k=>$v){
            if($v!==$b[$k])return false;
        }
        return true;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'question_lists'=>'required',
            // 'question_lists.*.answer'=>'required',
        ]);
        // return 'cok';
        $assigment = Assigment::with(['question_lists'=>function($query)use($request){
            $query->selectRaw('question_lists.*,ats.description as assigment_type')
            ->join('assigment_question_lists as aql','aql.question_list_id','=','question_lists.id')
            ->join('assigment_types as ats','ats.id','=','aql.assigment_type_id')
            ->where('aql.assigment_id', $request->id);

            // ->groupBy('aql.question_list_id');
        }, 'question_lists.answer_lists'])->findOrFail($request->id);

        return $assigment;
        // $session = Session::
        try{


        }catch(\PDOException $e){
            DB::rollBack();
            return response($e,500);
           
        }catch(\Exception $e){
            DB::rollBack();
            return response($e,500);
          
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function createAssigmentSession(Request $request){
        $request->validate([
            'assigment_id'=>'required'
        ]);

        $user = $request->user();
        $userProfile = $user->load('profile');
        $educationalLevelId = $userProfile->profile->educational_level_id;

        $assigment = Assigment::with('teacher','grade')
        ->withCount('question_lists')
        ->whereHas('grade',function($query)use($educationalLevelId){
            $query->where('educational_level_id',$educationalLevelId);
        })
        ->whereNotNull('teacher_id')
        ->findOrFail($request->assigment_id);
        
        $is_workable = true;
        // jika end_at kosong dan jika tgl sekarang belum masuk dalam start_at, maka belum dimulai
        if(!empty($assigment->start_at) && empty($assigment->end_at)){
            $start_at = new Carbon($assigment->start_at);
            $is_workable = Carbon::now()->greaterThanOrEqualTo($start_at);
        
        }
        // jika start_at kosong dan jika tgl sekarang sudah melewati end_at, maka expired
        elseif(empty($assigment->start_at) && !empty($assigment->end_at)){
            $end_at = new Carbon($assigment->end_at);
            $is_expired = Carbon::now()->greaterThanOrEqualTo($end_at);
            $is_workable = !$is_expired;
        }
        // jika start_at dan end_at tidak kosong semua,
        elseif(!empty($assigment->start_at) && !empty($assigment->end_at)){
            $start_at = new Carbon($assigment->start_at);
            $end_at = new Carbon($assigment->end_at);
            $is_workable = Carbon::now()->isBetween($start_at, $end_at);
            // return $is_workable;
        }
        if(!$is_workable)return response("Assigment tidak ada",404);


        $check = Session::with('assigments')->whereHas('assigments', function($query)use($request){
            $query->where('assigments.id',$request->assigment_id);
        })->where('user_id',$user->id);

        if($check->exists()){
            return $check->first();
        }else{
            // return 'abb';
            
            try{
                DB::beginTransaction();
                $session = new Session;
                $session->user_id = $user->id;
                $session->save();
                //user_id = teacher_id yang digunakan pada tahap selanjutnya
                $assigment->sessions()->sync([$session->id => ['user_id'=>$assigment->teacher_id]]);
                DB::commit();
                return $session->load('assigments');
            
            }catch (\PDOException $e) {
                // Woopsy
                
                DB::rollBack();
                dd($e);
            }
        }
       
        // $request->validate([

        // ]);
    }
}
