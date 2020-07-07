<?php

namespace App\Exceptions;

class ParticipantAlreadyExistException extends BusinessLogicException
{
    /**
     * @return int|mixed
     */
    public function statusCode()
    {
        return self::PARTICIPANT_ALREADY_EXIST;
    }
}
