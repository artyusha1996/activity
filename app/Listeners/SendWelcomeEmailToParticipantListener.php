<?php

namespace App\Listeners;

use App\Events\ParticipantCreatedEvent;
use App\Notifications\ParticipantWelcomeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmailToParticipantListener implements ShouldQueue
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
        $participant->notify(new ParticipantWelcomeNotification());
    }
}
