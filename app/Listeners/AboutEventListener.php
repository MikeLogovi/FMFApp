<?php

namespace App\Listeners;

use App\Events\AboutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AboutEventListener
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
     * @param  AboutEvent  $event
     * @return void
     */
    public function handle(AboutEvent $event)
    {
        //
    }
}
