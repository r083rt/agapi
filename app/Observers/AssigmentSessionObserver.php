<?php

namespace App\Observers;

use App\Models\AssigmentSession;
use Illuminate\Support\Facades\Log;
use App\Notifications\AssigmentNotification;


class AssigmentSessionObserver
{
    /**
     * Handle the assigment session "created" event.
     *
     * @param  \App\Models\AssigmentSession  $assigmentSession
     * @return void
     */
    public function created(AssigmentSession $assigmentSession)
    {

        Log::debug('created assigmentsessionobserver');
        if($assigmentSession->assigment->teacher_id!=null){

            $assigmentSession->load(['session.user','teacher']);
            Log::debug($assigmentSession);

            \App\Events\AssigmentTeacherEvent::dispatch($assigmentSession);
            // $data->teacher->notify(new AssigmentNotification($data));
            // //Log::debug($data);
            if($assigmentSession->total_score!=null){
                // $data->session->user->notify(new AssigmentNotification($data));
                \App\Events\AssigmentStudentEvent::dispatch($assigmentSession);

            }
        }else{
            //Log::debug('teacher_id kosong');
        }

      

    }

    /**
     * Handle the assigment session "updated" event.
     *
     * @param  \App\Models\AssigmentSession  $assigmentSession
     * @return void
     */
    public function updated(AssigmentSession $assigmentSession)
    {
        Log::debug('updated assigmentsesionobserver');
        \App\Models\Notification::whereHasMorph('notifiable', 'App\Models\User',function($query)use($assigmentSession){
            $query->where('id','=',$assigmentSession->session->user_id);  //session->user_id = murid
          })
          ->where('type','App\Notifications\AssigmentNotification')
          ->whereJsonContains('data->data->id',$assigmentSession->id)->delete();

        //   ->where('data','REGEXP','{"data":{"id":\s*'.$assigmentSession->id)->delete();

            if($assigmentSession->total_score!==null && $assigmentSession->assigment->teacher_id!==null){
                $assigmentSession->load('session.user','teacher');

                \App\Events\AssigmentStudentEvent::dispatch($assigmentSession);
                // $data->session->user->notify(new AssigmentNotification($data));
            }
       

    }

    /**
     * Handle the assigment session "deleted" event.
     *
     * @param  \App\Models\AssigmentSession  $assigmentSession
     * @return void
     */
    public function deleted(AssigmentSession $assigmentSession)
    {
        // return  \App\Models\Notification::whereHasMorph('notifiable', 'App\Models\User',function($query)use($assigmentSession){
        //     $query->where('id','=',$assigmentSession->session->user->id);  
        //   })
        //   ->where('type','App\Notifications\AssigmentNotification')
        //   ->where('data','REGEXP','"like_id":\s*'.abs($id))->get();
    }

    /**
     * Handle the assigment session "restored" event.
     *
     * @param  \App\Models\AssigmentSession  $assigmentSession
     * @return void
     */
    public function restored(AssigmentSession $assigmentSession)
    {
        //
    }

    /**
     * Handle the assigment session "force deleted" event.
     *
     * @param  \App\Models\AssigmentSession  $assigmentSession
     * @return void
     */
    public function forceDeleted(AssigmentSession $assigmentSession)
    {
        //
    }
}
