<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantCreateRequest;
use App\Http\Requests\ParticipantDestroyRequest;
use App\Http\Requests\ParticipantListRequest;
use App\Http\Requests\ParticipantShowRequest;
use App\Http\Requests\ParticipantUpdateRequest;
use App\Http\Resources\Participant;
use App\Services\ActivityService;
use App\Services\ParticipantService;

/**
 * Class ParticipantController.
 *
 * @package namespace App\Http\Controllers;
 */
class ParticipantController extends Controller
{
    /**
     * @var ParticipantService
     */
    private $participantService;
    /**
     * @var ActivityService
     */
    private $activityService;
    /**
     * ParticipantController constructor.
     * @param ParticipantService $participantService
     * @param ActivityService $activityService
     */
    public function __construct(
        ParticipantService $participantService,
        ActivityService $activityService
    )
    {
        $this->participantService = $participantService;
        $this->activityService = $activityService;
    }

    /**
     * @param ParticipantListRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \App\Exceptions\ActivityNotFoundException
     */
    public function index(ParticipantListRequest $request)
    {
        $activity = $this->activityService->firstById($request->getActivityId());
        $participants = $this->participantService->getByActivityId($activity);

        return Participant::collection($participants);
    }

    /**
     * @param ParticipantCreateRequest $request
     * @return Participant
     * @throws \App\Exceptions\ActivityNotFoundException
     * @throws \Throwable
     */
    public function store(ParticipantCreateRequest $request)
    {
        $activity = $this->activityService->firstById($request->getActivityId());
        $participant = $this->participantService->create(
            $activity, $request->getEmail(), $request->getFirstName(), $request->getLastName()
        );

        return new Participant($participant);
    }

    /**
     * @param ParticipantShowRequest $request
     * @return Participant
     * @throws \App\Exceptions\ParticipantNotFoundException
     */
    public function show(ParticipantShowRequest $request)
    {
        $participant = $this->participantService->firstById($request->getId());

        return new Participant($participant);
    }

    /**
     * @param ParticipantUpdateRequest $request
     * @return Participant
     * @throws \App\Exceptions\ParticipantAlreadyExistException
     * @throws \App\Exceptions\ParticipantNotFoundException
     */
    public function update(ParticipantUpdateRequest $request)
    {
        $participant = $this->participantService->firstById($request->getId());
        $participant = $this->participantService->update($participant, [
            'email' => $request->getEmail(),
            'firstName' => $request->getFirstName(),
            'lastName' => $request->getLastName(),
        ]);

        return new Participant($participant);
    }

    /**
     * @param ParticipantDestroyRequest $request
     * @return Participant
     * @throws \App\Exceptions\ParticipantNotFoundException
     */
    public function destroy(ParticipantDestroyRequest $request)
    {
        $participant = $this->participantService->firstById($request->getId());
        $this->participantService->delete($participant);

        return new Participant($participant);
    }
}
