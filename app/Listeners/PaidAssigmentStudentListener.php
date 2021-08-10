<?php

namespace App\Listeners;

use App\Events\PaidAssigmentStudentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaidAssigmentStudentListener
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
     * @param  PaidAssigmentStudentEvent  $event
     * @return void
     */
    public function handle(PaidAssigmentStudentEvent $event)
    {
        $event->data->session->user->notify(new \App\Notifications\PaidAssigmentNotification($event->data));
    }
}
