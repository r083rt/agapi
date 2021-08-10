<?php

namespace App\Listeners;

use App\Events\PaidAssigmentUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaidAssigmentUserListener
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
     * @param  PaidAssigmentUserEvent  $event
     * @return void
     */
    public function handle(PaidAssigmentUserEvent $event)
    {
        $event->data->assigment->user->notify(new \App\Notifications\PaidAssigmentNotification($event->data));
    }
}
