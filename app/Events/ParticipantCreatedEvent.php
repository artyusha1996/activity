<?php

namespace App\Events;

use App\Entities\Participant;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ParticipantCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $participant;

    /**
     * Create a new event instance.
     *
     * ParticipantCreatedEvent constructor.
     * @param Participant $participant
     */
    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }
}
