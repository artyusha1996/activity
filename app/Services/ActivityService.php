<?php


namespace App\Services;


use App\Exceptions\ActivityNotFoundException;
use App\Repositories\ActivityRepository;

class ActivityService
{
    /**
     * @var ActivityRepository
     */
    private $activityRepository;

    /**
     * ActivityService constructor.
     * @param ActivityRepository $activityRepository
     */
    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ActivityNotFoundException
     */
    public function firstById(int $id)
    {
        $activity = $this->activityRepository->find($id);
        if (!$activity) {
            throw new ActivityNotFoundException();
        }

        return $activity;
    }
}
