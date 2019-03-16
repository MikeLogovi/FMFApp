<?php

namespace App\Listeners;

use App\Events\ContactUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUpdatedListener
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
     * @param  ContactUpdated  $event
     * @return void
     */
    public function handle(ContactUpdated $event)
    {
        //
    }
}
