<?php

namespace App\Exceptions;

class ActivityNotFoundException extends BusinessLogicException
{
    /**
     * @return int
     */
    public function statusCode()
    {
        return self::ACTIVITY_NOT_FOUND;
    }
}
