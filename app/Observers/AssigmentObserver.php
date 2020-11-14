<?php

namespace App\Observers;

use App\Models\Assigment;

use App\Notifications\AssigmentSharedNotification;

class AssigmentObserver
{
    /**
     * Handle the assigment "created" event.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return void
     */
    public function created(Assigment $assigment)
    {
        //Jika master soal dishare oleh guru lain, maka kirim notifikasi ke pembuat soal
        if($assigment->teacher_id!=null){
            if($assigment->user_id!=$assigment->teacher_id){
                $data = $assigment->loadMissing('user','teacher');
                $data->user->notify(new AssigmentSharedNotification($data));
            }
        }
        //Log::debug('anjay');
    }

    /**
     * Handle the assigment "updated" event.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return void
     */
    public function updated(Assigment $assigment)
    {
        //
    }

    /**
     * Handle the assigment "deleted" event.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return void
     */
    public function deleted(Assigment $assigment)
    {
        //
    }

    /**
     * Handle the assigment "restored" event.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return void
     */
    public function restored(Assigment $assigment)
    {
        //
    }

    /**
     * Handle the assigment "force deleted" event.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return void
     */
    public function forceDeleted(Assigment $assigment)
    {
        //
    }
}
