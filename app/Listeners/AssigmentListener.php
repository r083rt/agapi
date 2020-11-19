<?php

namespace App\Listeners;

use App\Events\AssigmentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssigmentListener
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
     * @param  AssigmentEvent  $event
     * @return void
     */
    public function handle(AssigmentEvent $event)
    {
        //Log::debug($data);
        


    }
}
