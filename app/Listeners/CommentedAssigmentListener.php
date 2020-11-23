<?php

namespace App\Listeners;

use App\Events\CommentedAssigmentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CommentedAssigmentListener
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
     * @param  CommentedAssigmentEvent  $event
     * @return void
     */
    public function handle(CommentedAssigmentEvent $event)
    {
        //
    }
}
