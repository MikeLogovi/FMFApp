<?php

namespace App\Listeners;

use App\Events\EventEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventEventListener
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
     * @param  EventEvent  $event
     * @return void
     */
    public function handle(EventEvent $event)
    {
        //
    }
}
