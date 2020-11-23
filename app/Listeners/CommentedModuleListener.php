<?php

namespace App\Listeners;

use App\Events\CommentedModuleEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\CommentedModuleNotification;

class CommentedModuleListener
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
     * @param  CommentedModuleEvent  $event
     * @return void
     */
    public function handle(CommentedModuleEvent $event)
    {
        $comment = $event->data;
        $author_id = $comment->commentable->user_id;
        \App\Models\User::find($author_id)->notify(new CommentedModuleNotification($comment));
    }
}
