<?php

namespace App\Listeners;

use App\Events\CourseAddedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CourseFactorsInitiator
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
    public function handle(CourseAddedEvent $event): void
    {
        //
    }
}
