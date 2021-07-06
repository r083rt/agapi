<?php

namespace App\Http\Controllers\API\v1\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;
use App\Models\Session;
use Carbon\Carbon;
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
}
