<?php

namespace App\Listeners;

use App\Events\LikedCommentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\LikedCommentNotification;
// use Illuminate\Support\Facades\Log;

class LikedCommentListener
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
     * @param  LikedCommentEvent  $event
     * @return void
     */
    public function handle(LikedCommentEvent $event)
    {
        $like=$event->data;
        $author_id=$like->likeable->user_id;
        \App\Models\User::find($author_id)->notify(new \App\Notifications\LikedCommentNotification($like));

    }
}
