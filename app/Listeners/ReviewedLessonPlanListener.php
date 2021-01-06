<?php

namespace App\Listeners;

use App\Events\ReviewedLessonPlanEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReviewedLessonPlanListener
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
     * @param  ReviewedLessonPlanEvent  $event
     * @return void
     */
    public function handle(ReviewedLessonPlanEvent $event)
    {
        //
    }
}
