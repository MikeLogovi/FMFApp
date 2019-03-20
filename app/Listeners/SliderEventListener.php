<?php

namespace App\Listeners;

use App\Events\SliderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SliderEventListener
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
     * @param  SliderEvent  $event
     * @return void
     */
    public function handle(SliderEvent $event)
    {
        //
    }
}
