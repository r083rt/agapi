<?php

namespace App\Listeners;

use App\Events\LikedLessonPlanCommentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LikedLessonPlanCommentListener
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
     * @param  LikedLessonPlanCommentEvent  $event
     * @return void
     */
    public function handle(LikedLessonPlanCommentEvent $event)
    {
        $like=$event->data;
        $author_id=$like->likeable->user_id;
        \App\Models\User::find($author_id)->notify(new \App\Notifications\LikedLessonPlanCommentNotification($like));
    }
}
