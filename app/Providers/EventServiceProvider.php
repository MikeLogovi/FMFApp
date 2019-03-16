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
