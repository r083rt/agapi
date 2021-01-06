<?php

namespace App\Listeners;

use App\Events\LikedLessonPlanEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\LikedLessonPlanNotification;

class LikedLessonPlanListener
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
     * @param  LikedLessonPlanEvent  $event
     * @return void
     */
    public function handle(LikedLessonPlanEvent $event)
    {
        $like=$event->data;
        $author_id=$like->likeable->user_id;
        \App\Models\User::find($author_id)->notify(new LikedLessonPlanNotification($like));
    }
}
