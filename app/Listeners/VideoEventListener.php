<?php

namespace App\Listeners;

use App\Events\VideoEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class VideoEventListener
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
     * @param  VideoEvent  $event
     * @return void
     */
    public function handle(VideoEvent $event)
    {
        //
    }
}
