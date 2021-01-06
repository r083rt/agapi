<?php

namespace App\Listeners;

use App\Events\AssigmentTeacherEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssigmentTeacherListener
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
     * @param  AssigmentTeacherEvent  $event
     * @return void
     */
    public function handle(AssigmentTeacherEvent $event)
    {
        $event->data->teacher->notify(new \App\Notifications\AssigmentNotification($event->data));
    }
}
