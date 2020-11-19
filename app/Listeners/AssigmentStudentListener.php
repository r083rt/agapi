<?php

namespace App\Listeners;

use App\Events\AssigmentStudentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssigmentStudentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AssigmentStudentEvent  $event
     * @return void
     */
    public function handle(AssigmentStudentEvent $event)
    {
        $event->data->session->user->notify(new \App\Notifications\AssigmentNotification($event->data));

    }
}
