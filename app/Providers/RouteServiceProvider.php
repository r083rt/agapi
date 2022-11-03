<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */

    protected $namespace = 'App\Http\Controllers';
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {

        // ORIGINAL ROUTE SETTING -------
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->name('api.')
            ->group(base_path('routes/api.php'));
        // END ORIGINAL ------------------

        // API v1 ROUTE SETTING -------
        Route::prefix('api')
            ->middleware('api')
            ->namespace(\App\Http\Controllers\API\v1::class)
            ->name('api.v1.')
            ->group(base_path('routes/api/v1.php'));
        // END ORIGINAL ------------------

        // API v1 ROUTE SETTING -------
        Route::prefix('api/v1/student')
            ->middleware('api')
            ->namespace(\App\Http\Controllers\API\v1\Student::class)
            ->name('api.v1.student.')
            ->group(base_path('routes/api/v1/student.php'));
        // END ORIGINAL ------------------

        Route::group([
            'middleware' => 'auth:api',
            'namespace' => \App\Http\Controllers\API\v2\teacher::class,
            'prefix' => 'api/v2/teacher',
            'name' => 'api.v2.teacher.',
        ], function ($router) {
            // V2 untuk penilaian kegiatan akademik API
            require base_path('routes/api/v2/teacher.php');
        });

        Route::group([
            // 'middleware' => 'auth:api',
            'namespace' => \App\Http\Controllers\API\v2\member::class,
            'prefix' => 'api/v2/member',
            'name' => 'api.v2.member.',
        ], function ($router) {
            // V2 untuk member agpaii API
            require base_path('routes/api/v2/member.php');
        });

        // Route::group([
        //     'middleware' => 'auth:api',
        //     'namespace' => \App\Http\Controllers\API\v2\Student::class,
        //     'prefix' => 'api/v2/student',
        //     'name' => 'api.v2.student.',
        // ], function ($router) {
        //     // V2 untuk murid API
        //     require base_path('routes/api/v2/student.php');
        // });

        Route::group([
            // 'middleware' => ['auth:api', 'isAdmin'],
            'namespace' => \App\Http\Controllers\API\v2\admin::class,
            'prefix' => 'api/v2/admin',
            'name' => 'api.v2.admin.',
        ], function ($router) {
            // V2 untuk murid API
            require base_path('routes/api/v2/admin.php');
        });
    }
}
