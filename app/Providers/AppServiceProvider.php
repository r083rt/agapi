<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // AssigmentSession::observe(AssigmentSessionObserver::class);
        // Assigment::observe(AssigmentObserver::class);
        // Session::observe(SessionObserver::class);
    }
}
