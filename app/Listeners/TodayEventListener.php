<?php

namespace App\Listeners;

use App\Events\TodayEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TodayEventListener
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
     * @param  TodayEvent  $event
     * @return void
     */
    public function handle(TodayEvent $event)
    {
        //
    }
}
