<?php

namespace App\Listeners;

use App\Events\UpcomingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpcomingEventListener
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
     * @param  UpcomingEvent  $event
     * @return void
     */
    public function handle(UpcomingEvent $event)
    {
        //
    }
}
