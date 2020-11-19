<?php

namespace App\Listeners;

use App\Events\AssigmentSharedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssigmentSharedListener
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
     * @param  AssigmentSharedEvent  $event
     * @return void
     */
    public function handle(AssigmentSharedEvent $event)
    {
        $event->data->user->notify(new \App\Notifications\AssigmentSharedNotification($event->data));
    }
}
