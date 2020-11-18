<?php

namespace App\Listeners;

use App\Events\TestEvent2;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TestListener2
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
     * @param  TestEvent2  $event
     * @return void
     */
    public function handle(TestEvent2 $event)
    {
        Log::debug('anjay');
        Log::debug($event->user);   
    }
}
