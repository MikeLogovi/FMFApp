<?php

namespace App\Listeners;

use App\Events\SocialiteEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SocialiteEventListener
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
     * @param  SocialiteEvent  $event
     * @return void
     */
    public function handle(SocialiteEvent $event)
    {
        //
    }
}
