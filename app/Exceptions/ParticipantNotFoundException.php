<?php

namespace App\Exceptions;

use Exception;

class ParticipantNotFoundException extends BusinessLogicException
{
    /**
     * @return int|mixed
     */
    public function statusCode()
    {
        return self::PARTICIPANT_NOT_FOUND;
    }
}
