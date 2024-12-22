<?php

namespace App\Listeners;

use App\Events\GeneralNotificationsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class GeneralNotificationsListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(GeneralNotificationsEvent $event): void
    {
        //
    }
}
