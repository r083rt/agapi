<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\TestEvent2'=>[
            'App\Listeners\TestListener2',
        ],
        'App\Events\LikedPostEvent'=>[
            'App\Listeners\LikedPostListener',
        ],
        'App\Events\CommentedPostEvent'=>[
            'App\Listeners\CommentedPostListener',
        ],
        'App\Events\LikedCommentEvent'=>[
            'App\Listeners\LikedCommentListener',
        ],
        'App\Events\AssigmentTeacherEvent'=>[
            'App\Listeners\AssigmentTeacherListener',
        ],
        'App\Events\AssigmentStudentEvent'=>[
            'App\Listeners\AssigmentStudentListener',
        ],
        'App\Events\AssigmentSharedEvent'=>[
            'App\Listeners\AssigmentSharedListener',
        ],  
        'App\Events\CommentedAssigmentEvent'=>[
            'App\Listeners\CommentedAssigmentListener',
        ],
        //Module
        'App\Events\CommentedModuleEvent'=>[
            'App\Listeners\CommentedModuleListener',
        ],
        'App\Events\LikedModuleEvent'=>[
            'App\Listeners\LikedModuleListener',
        ],
        'App\Events\LikedModuleCommentEvent'=>[
            'App\Listeners\LikedModuleCommentListener',
        ],
        //LessonPlan
        'App\Events\CommentedLessonPlanEvent'=>[
            'App\Listeners\CommentedLessonPlanListener',
        ],
        'App\Events\LikedLessonPlanEvent'=>[
            'App\Listeners\LikedLessonPlanListener',
        ],
        'App\Events\LikedLessonPlanCommentEvent'=>[
            'App\Listeners\LikedLessonPlanCommentListener',
        ],
        'App\Events\ReviewedLessonPlanEvent'=>[
            'App\Listeners\ReviewedLessonPlanListener',
        ],
        'App\Events\AlsoCommentedPostEvent'=>[
            'App\Listeners\AlsoCommentedPostListener',
        ],
        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
