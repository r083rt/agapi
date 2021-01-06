<?php

namespace App\Listeners;

use App\Events\CommentedLessonPlanEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\CommentedLessonPlanNotification;

class CommentedLessonPlanListener
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
     * @param  CommentedLessonPlanEvent  $event
     * @return void
     */
    public function handle(CommentedLessonPlanEvent $event)
    {
        $comment = $event->data;
        $author_id = $comment->commentable->user_id;
        \App\Models\User::find($author_id)->notify(new CommentedLessonPlanNotification($comment));
    }
}
