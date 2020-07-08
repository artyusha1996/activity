<?php


namespace App\Listeners;

use App\Events\ParticipantCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogParticipantCreationListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(ParticipantCreatedEvent $event)
    {
        $participant = $event->participant;
        Log::info("Participant [$participant->email] was created successfully.");
    }
}
