<?php

namespace App\Listeners;

use App\Events\LikedModuleEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\LikedModuleNotification;

class LikedModuleListener
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
     * @param  LikedModuleEvent  $event
     * @return void
     */
    public function handle(LikedModuleEvent $event)
    {
        $like=$event->data;
        $author_id=$like->likeable->user_id;
        \App\Models\User::find($author_id)->notify(new LikedModuleNotification($like));
    }
}
