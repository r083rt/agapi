<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\AssigmentSession;
use App\Models\Assigment;
use App\Observers\AssigmentSessionObserver;
use App\Observers\AssigmentObserver;
use App\Models\Session;
use Illuminate\Support\Facades\Schema;
// use App\Models\Like;
use App\Observers\SessionObserver;
// use App\Observers\LikeObserver;

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
        Validator::includeUnvalidatedArrayKeys();
        Schema::defaultStringLength(191);
        AssigmentSession::observe(AssigmentSessionObserver::class);
        Assigment::observe(AssigmentObserver::class);
        Session::observe(SessionObserver::class);

        // Like::observe(LikeObserver::class);

    }
}
