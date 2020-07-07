<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ParticipantRepository;
use App\Entities\Participant;

/**
 * Class ParticipantRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ParticipantRepositoryEloquent extends BaseRepository implements ParticipantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Participant::class;
    }


    /**
     * Boot up the repository, pushing criteria
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
