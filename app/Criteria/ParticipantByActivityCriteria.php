<?php

namespace App\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ParticipantByActivityCriteria.
 *
 * @package namespace App\Criteria;
 */
class ParticipantByActivityCriteria implements CriteriaInterface
{
    private $activityId;

    /**
     * ParticipantByActivityCriteria constructor.
     * @param $activityId
     */
    public function __construct($activityId)
    {
        $this->activityId = $activityId;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $activityId = $this->activityId;

        $model->whereHas('activities', function (Builder $query) use ($activityId) {
            $query->where('id', $activityId);
        });

        return $model;
    }
}
