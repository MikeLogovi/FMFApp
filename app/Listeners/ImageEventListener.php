<?php

namespace App\Listeners;

use App\Events\ImageEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ImageEventListener
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
     * @param  ImageEvent  $event
     * @return void
     */
    public function handle(ImageEvent $event)
    {
        //
    }
}
