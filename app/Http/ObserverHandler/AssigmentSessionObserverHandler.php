<?php 
namespace App\Http\ObserverHandler;

use App\Models\AssigmentSession;
use Illuminate\Support\Facades\Log;

class AssigmentSessionObserverHandler{
    public static function handler($assigmentSession){
        Log::debug('created assigmentsessionobserver');
        if($assigmentSession->assigment->teacher_id!=null){

            $assigmentSession->load(['session.user','teacher']);
            Log::debug($assigmentSession);

            \App\Events\AssigmentTeacherEvent::dispatch($assigmentSession);
            // $data->teacher->notify(new AssigmentNotification($data));
            // //Log::debug($data);
            if($assigmentSession->total_score!==null){
                // $data->session->user->notify(new AssigmentNotification($data));
                \App\Events\AssigmentStudentEvent::dispatch($assigmentSession);

            }
        }else{
            //Log::debug('teacher_id kosong');
        }
    }
}
