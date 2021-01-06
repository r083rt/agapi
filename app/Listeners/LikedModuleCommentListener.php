<?php

namespace App\Listeners;

use App\Events\LikedModuleCommentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LikedModuleCommentListener
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
     * @param  LikedModuleCommentEvent  $event
     * @return void
     */
    public function handle(LikedModuleCommentEvent $event)
    {
        $like=$event->data;
        $author_id=$like->likeable->user_id;
        \App\Models\User::find($author_id)->notify(new \App\Notifications\LikedModuleCommentNotification($like));
    }
}
