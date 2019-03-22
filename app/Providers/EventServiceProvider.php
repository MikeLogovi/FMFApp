<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ContactUpdated' => [
            'App\Listeners\ContactUpdatedListener',
        ],
        'App\Events\WebsiteStateChanged'=>[
            'App\Listeners\WebsiteStateChangedListener',
        ],
        'App\Events\AboutEvent'=>[
            'App\Listeners\AboutEventListener',
        ],
        'App\Events\CommentEvent'=>[
            'App\Listeners\CommentEventListener',
        ],
        'App\Events\FooterEvent'=>[
            'App\Listeners\FooterEventListener',
        ],
        'App\Events\SocialiteEvent'=>[
            'App\Listeners\SocialiteEventListener',
        ],
        'App\Events\PostEvent'=>[
            'App\Listeners\PostEventListener',
        ],
        'App\Events\SliderEvent'=>[
            'App\Listeners\SliderEventListener',
        ],
        'App\Events\ImageEvent'=>[
            'App\Listeners\ImageEventListener',
        ],
        'App\Events\VideoEvent'=>[
            'App\Listeners\VideoEventListener',
        ],
        'App\Events\EventEvent'=>[
            'App\Listeners\EventEventListener',
        ],
        'App\Events\PastEvent'=>[
            'App\Listeners\PastEventListener',
        ],
        'App\Events\TodayEvent'=>[
            'App\Listeners\TodayEventListener',
        ],
        'App\Events\UpcomingEvent'=>[
            'App\Listeners\UpcomingEventListener',
        ],
        'App\Events\UserEvent'=>[
            'App\Listeners\UserEventListener',
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

        //
    }
}
