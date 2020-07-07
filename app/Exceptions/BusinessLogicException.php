<?php

namespace App\Exceptions;

use Exception;

abstract class BusinessLogicException extends Exception
{
    const ACTIVITY_NOT_FOUND = 600;
    const PARTICIPANT_ALREADY_EXIST = 601;
    const PARTICIPANT_HAS_ALREADY_ATTACHED_TO_THE_ACTIVITY = 602;
    const PARTICIPANT_NOT_FOUND = 603;
    const VALIDATION_FAILED = 604;

    /**
     * @return mixed
     */
    public abstract function statusCode();

    /**
     * @return string|null
     */
    public function message()
    {
        $key = $this->statusCode();

        return __("errors.$key");
    }
}
