<?php


namespace App\Exceptions;

class ParticipantHasAlreadyAttachedToTheActivityException extends BusinessLogicException
{
    /**
     * @return int|mixed
     */
    public function statusCode()
    {
        return self::PARTICIPANT_HAS_ALREADY_ATTACHED_TO_THE_ACTIVITY;
    }
}
