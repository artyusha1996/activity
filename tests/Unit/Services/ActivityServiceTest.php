<?php

namespace Tests\Unit\Services;

use App\Entities\Activity;
use App\Exceptions\ActivityNotFoundException;
use App\Repositories\ActivityRepository;
use App\Services\ActivityService;
use Tests\TestCase;
use Mockery;

class ActivityServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * @throws ActivityNotFoundException
     */
    public function testFirstByIdFail()
    {
        $id = 1;
        $repositoryMock = Mockery::mock(ActivityRepository::class);
        $repositoryMock->shouldReceive('find')
            ->andReturn(null);

        $this->expectException(ActivityNotFoundException::class);

        $instance = new ActivityService($repositoryMock);
        $instance->firstById($id);
    }

    /**
     * @throws ActivityNotFoundException
     */
    public function testFirstByIdSuccess()
    {
        $id = 1;
        $repositoryMock = Mockery::mock(ActivityRepository::class);
        $mockedActivity = factory(Activity::class)->make();
        $repositoryMock->shouldReceive('find')
            ->andReturn($mockedActivity);

        $instance = new ActivityService($repositoryMock);
        $result = $instance->firstById($id);

        $this->assertEquals($mockedActivity, $result);
    }
}
