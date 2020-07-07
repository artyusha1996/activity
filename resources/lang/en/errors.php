<?php

return [
    \App\Exceptions\BusinessLogicException::ACTIVITY_NOT_FOUND => 'Activity not found.',
    \App\Exceptions\BusinessLogicException::PARTICIPANT_ALREADY_EXIST => 'Participant does not exist.',
    \App\Exceptions\BusinessLogicException::PARTICIPANT_HAS_ALREADY_ATTACHED_TO_THE_ACTIVITY =>
        'Participant has already attached to the activity.',
    \App\Exceptions\BusinessLogicException::PARTICIPANT_NOT_FOUND => 'Participant not found.',
    \App\Exceptions\BusinessLogicException::VALIDATION_FAILED => 'Invalid data.',
];
