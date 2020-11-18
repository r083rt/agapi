<?php

namespace App\Listeners;

use App\Events\CommentedPostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\CommentedPostNotification;

class CommentedPostListener
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
     * @param  CommentedPostEvent  $event
     * @return void
     */
    public function handle(CommentedPostEvent $event)
    {
        $comment = $event->data;
        $author_id = $comment->commentable->author_id;
        \App\Models\User::find($author_id)->notify(new CommentedPostNotification($comment));

    }
}
