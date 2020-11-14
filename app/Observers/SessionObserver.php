<?php

namespace App\Observers;

use App\Models\Session;
use Illuminate\Support\Facades\Log;
use App\Notifications\AssigmentNotification;

class SessionObserver
{
    /**
     * Handle the session "created" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */
    public function created(Session $session)
    {
        $session->load('assigments');
        Log::debug($session);
    }

    /**
     * Handle the session "updated" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */
    public function updated(Session $session)
    {
        //
    }

    /**
     * Handle the session "deleted" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */
    public function deleted(Session $session)
    {
        //
    }

    /**
     * Handle the session "restored" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */
    public function restored(Session $session)
    {
        //
    }

    /**
     * Handle the session "force deleted" event.
     *
     * @param  \App\Models\Session  $session
     * @return void
     */
    public function forceDeleted(Session $session)
    {
        //
    }
}
