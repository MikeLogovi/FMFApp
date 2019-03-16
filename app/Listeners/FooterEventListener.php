<?php

namespace App\Listeners;

use App\Events\FooterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FooterEventListener
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
     * @param  FooterEvent  $event
     * @return void
     */
    public function handle(FooterEvent $event)
    {
        //
    }
}
