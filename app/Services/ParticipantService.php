<?php


namespace App\Services;


use App\Criteria\ParticipantByActivityCriteria;
use App\Entities\Activity;
use App\Entities\Participant;
use App\Events\ParticipantCreatedEvent;
use App\Exceptions\ParticipantAlreadyExistException;
use App\Exceptions\ParticipantHasAlreadyAttachedToTheActivityException;
use App\Exceptions\ParticipantNotFoundException;
use App\Repositories\ActivityHasParticipantRepository;
use App\Repositories\ParticipantRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Throwable;

class ParticipantService
{
    /**
     * @var ParticipantRepository
     */
    private $participantRepository;
    /**
     * @var ActivityHasParticipantRepository
     */
    private $activityHasParticipantRepository;

    /**
     * ParticipantService constructor.
     * @param ParticipantRepository $participantRepository
     * @param ActivityHasParticipantRepository $activityHasParticipantRepository
     */
    public function __construct(
        ParticipantRepository $participantRepository,
        ActivityHasParticipantRepository $activityHasParticipantRepository
    )
    {
        $this->participantRepository = $participantRepository;
        $this->activityHasParticipantRepository = $activityHasParticipantRepository;
    }

    /**
     * @param Activity $activity
     * @param array $with
     * @return mixed
     */
    public function getByActivityId(Activity $activity, $with = [])
    {
        $this->participantRepository->pushCriteria(new ParticipantByActivityCriteria($activity->id));
        if (!empty($with)) {
            $this->participantRepository->with($with);
        }
        return $this->participantRepository->all();
    }

    /**
     * @param int $id
     * @param array $withRelations
     * @return mixed
     * @throws ParticipantNotFoundException
     */
    public function firstById(int $id, $withRelations = [])
    {
        if (!empty($withRelations)) {
            $this->participantRepository->with($withRelations);
        }

        $participant = $this->participantRepository->find($id);
        if (!$participant) {
            throw new ParticipantNotFoundException();
        }

        return $participant;
    }

    /**
     * @param Participant $participant
     * @return int
     */
    public function delete(Participant $participant)
    {
        return $this->participantRepository->delete($participant->id);
    }

    /**
     * @param Activity $activity
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @return mixed
     * @throws Throwable
     */
    public function create(Activity $activity, string $email, string $firstName, string $lastName)
    {
        $participant = $this->participantRepository->findWhere([
            'email' => $email,
        ])->first();

        DB::beginTransaction();
        try {
            if (!$participant) {
                $participant = $this->participantRepository->create([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $email,
                ]);
            }

            $alreadyAttached = $this->activityHasParticipantRepository
                ->findWhere([
                    'activity_id' => $activity->id,
                    'participant_id' => $participant->id
                ])
                ->first();

            if ($alreadyAttached) {
                throw new ParticipantHasAlreadyAttachedToTheActivityException();
            }

            $this->activityHasParticipantRepository->create([
                'activity_id' => $activity->id,
                'participant_id' => $participant->id
            ]);
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }

        event(new ParticipantCreatedEvent($participant));

        DB::commit();


        return $this->participantRepository->with(['activities.city'])->find($participant->id);
    }

    /**
     * @param Participant $participant
     * @param array $attributes
     * @return mixed
     * @throws ParticipantAlreadyExistException
     */
    public function update(Participant $participant, array $attributes)
    {
        $email = Arr::get($attributes, 'email');
        $firstName = Arr::get($attributes, 'firstName');
        $lastName = Arr::get($attributes, 'lastName');
        $emailAlreadyExist = false;
        if ($email) {
            $emailAlreadyExist = (bool)$this->participantRepository->findWhere([
                'email' => $email,
                [
                    'id', '!=', $participant->id,
                ],
            ])->first();
        }
        if ($emailAlreadyExist) {
            throw new ParticipantAlreadyExistException();
        }

        $this->participantRepository->update([
            'email' => $email,
            'first_name' => $firstName,
            'last_name' => $lastName,
        ], $participant->id);

        return $this->participantRepository->find($participant->id);
    }
}
