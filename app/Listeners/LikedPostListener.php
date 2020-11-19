<?php

namespace App\Listeners;

use App\Events\LikedPostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\LikedPostNotification;

class LikedPostListener
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
     * @param  LikedPostEvent  $event
     * @return void
     */
    public function handle(LikedPostEvent $event)
    {
        $like=$event->data;
        $author_id=$like->likeable->author_id;
        \App\Models\User::find($author_id)->notify(new LikedPostNotification($like));

    }
}
