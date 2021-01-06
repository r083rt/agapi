<?php

namespace App\Listeners;

use App\Events\AlsoCommentedPostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\AlsoCommentedPostNotification;
// use Illuminate\Notifications\ChannelManager;

class AlsoCommentedPostListener
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
     * @param  AlsoCommentedPostEvent  $event
     * @return void
     */
    public function handle(AlsoCommentedPostEvent $event)
    {
        $comment = $event->data;
        $user_id = $comment->user_id;
        $event->user->notify(new AlsoCommentedPostNotification($comment));
    }
}
