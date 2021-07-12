<?php

namespace App\Http\Controllers\API\v1\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

use DB;
class AssigmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    // session yang belum selesai:
    // session yang jumlah questions tidak sama dengan jumlah assigments.question_lists
    public function unfinishedAssigment($type='sharedassigment'){
        $userProfile = auth('api')->user()->load('profile');
        $educationalLevelId = $userProfile->profile->educational_level_id;
        if($educationalLevelId==null)return response()->json(['error_jenjang'=>true]);

        $totalQuestionLists = DB::table('assigment_question_lists as aql')
        ->selectRaw('aql.assigment_id,count(1) question_lists_total')
        ->groupBy('aql.assigment_id');

        $totalQuestions = DB::table('questions as q')
        ->selectRaw('q.session_id,count(1) as questions_total')
        ->groupBy('q.session_id');

        $query = DB::table('sessions')
        ->selectRaw('sessions.id,
        sessions.user_id,
        sessions.created_at,
        ass.assigment_id,
        a.name,
        a.code,
        a.timer,
        a.end_at,
        a.start_at,
        users.name as teacher,
        grades.educational_level_id,
        grades.description,
        a.is_public,
        a.teacher_id,
        assigment_question_lists_pivot.question_lists_total,
        questions_pivot.questions_total')
        ->join('assigment_sessions as ass', 'ass.session_id','=','sessions.id')
        ->join('assigments as a', 'a.id','=','ass.assigment_id')
        ->join('grades', 'grades.id','=','a.grade_id')
        ->join('users','users.id','=','a.teacher_id')
        ->joinSub($totalQuestionLists, 'assigment_question_lists_pivot', function($join){
            $join->on('assigment_question_lists_pivot.assigment_id','=','ass.assigment_id');
        })
        ->leftJoinSub($totalQuestions, 'questions_pivot', function($join){
            $join->on('questions_pivot.session_id','=','sessions.id');
        })
        ->where('grades.educational_level_id',$educationalLevelId)
        ->where(function($query2){
            $query2->whereColumn('questions_pivot.questions_total','!=','assigment_question_lists_pivot.question_lists_total')
            ->orWhereNull('questions_pivot.questions_total');
        })
        ->where('sessions.user_id',$userProfile->id)
        ->orderBy('sessions.id','desc');

        if($type=='sharedassigment'){ //menampilkan sharedassigment yang telah dikerjakan
            $query->whereNotNull('teacher_id');
        }elseif($type=='masterassigment'){ //menampilkan master soal (latihan soal) yang telah dikerjakan
            $query->whereNull('teacher_id')->where('is_public','=',true);
        }else{
            return abort(404);   
        }
        // return $query->get();
        $data = $query->paginate();
        foreach($data as $session){
            if($session->timer){
                // $session->end_time_unixtimestamp = Carbon::now()

                $timer = intval($session->timer);
                $carbon = new Carbon($session->created_at);
                $seconds_diff = Carbon::now()->diffInSeconds($carbon);
                $session->seconds_diff = $seconds_diff;
                $minutes_diff = round($seconds_diff/60);
                $is_timer_ended = $minutes_diff>=$timer?true:false;
                $session->is_timer_ended = $is_timer_ended;

                $session->actualEndTime = $carbon->add($timer, 'minutes')->getTimeStamp();
                $session->actualStartTime = Carbon::parse($session->created_at)->getTimeStamp();

            }
            
            if(!empty($session->end_at)){
                $end_at = new Carbon($session->end_at);
                $is_expired = Carbon::now()->greaterThanOrEqualTo($end_at);
                $session->is_expired = $is_expired;
            }
            
            
        }
        return $data;
        //sharedassigment = paket soal hasil salinan dari master paket soal
       
    }
    public function search($key){
      
        // return 'cok';
        $userProfile = auth('api')->user()->load('profile');
        $educationalLevelId = $userProfile->profile->educational_level_id;
        if($educationalLevelId==null)return response()->json(['error_jenjang'=>true]);

        // cari apakah ada session dgn assigment code $key 
        $assigment = Assigment::with('teacher','grade')
        ->withCount('question_lists')
        ->whereHas('grade',function($query)use($educationalLevelId){
            $query->where('educational_level_id',$educationalLevelId);
        })
        ->whereNotNull('teacher_id')
        ->where('code',$key)->first();
        if(!$assigment)return response('Assigment tidak ada',404);

        $session = Session::whereHas('assigments',function($query)use($assigment){
            $query->where('assigments.id',$assigment->id);
        });

        
        //jika ada maka proses session tersebut
        if($session->exists()){
            $session = $session->with('assigments')->withCount('questions')->first();
            $is_submitted = false;
            $is_timer_ended = false;

            // jika jumlah questions sama dengan jumlah question_lists, maka berarti pengerjaannya sudah disubmit
            if($session->questions_count===$assigment->question_lists_count){
                $is_submitted = true;
            }
            // jika selisih menit waktu sekarang dan waktu di session.created_at melebihi assigment.timer+1, maka timer habis
            if(!empty($assigment->timer)){
                $timer = intval($assigment->timer);
                $diff_minutes = Carbon::now()->diffInMinutes($session->created_at);
                // toleransi 1 menit (+1)
                if($diff_minutes>$timer+1){
                    $is_timer_ended = true;
                }
            }

            
            $session->is_timer_ended = $is_timer_ended;
            $session->is_submitted = $is_submitted;
            $assigment->session = $session;
        }

        $is_expired = false; //jika melewati waktu assigments.end_at
        $is_workable = true; //jika belum maksuk waktu assigments.start_at 
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
            $is_expired = !$is_workable;
            // return $is_workable;
        }
        
        $assigment->is_workable = $is_workable;
        $assigment->is_expired = $is_expired;

        return $assigment;

    }
    public function buyAssigment(Request $request){
        $request->validate([
            'id'=>[
                'required'
            ]
        ]);
        $user = $request->user();
        $user_balance = $user->balance();
        $assigment = Assigment::where('is_paid','>=',1)->findOrFail($request->id);
        // jika saldo kurang maka return 403 dgn json
        if($user_balance<$assigment->is_paid){
            return response(['message'=>'Saldo kurang'], 403);
        }
        try{
            DB::beginTransaction();

            $necessary = \App\Models\Necessary::where('name','transfer')->first();
            if(!$necessary){
                return response('Necessary not found',404);
            }

            $payment = new \App\Models\Payment;
            $payment->type = 'OUT';
            $payment->necessary_id = $necessary->id;
            $payment->status = 'success';
            $payment->value = $assigment->value;
            $user->payments()->save($payment);

            DB::commit();
            return $payment;

        }catch (\PDOException $e) {
            DB::rollBack();
            return response($e->getMessage(), 500);
        }
      
    }
}
