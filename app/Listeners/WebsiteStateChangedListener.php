<?php

namespace App\Listeners;

use App\Events\WebsiteStateChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WebsiteStateChangedListener
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
     * @param  WebsiteStateChanged  $event
     * @return void
     */
    public function handle(WebsiteStateChanged $event)
    {
        //
    }
}
