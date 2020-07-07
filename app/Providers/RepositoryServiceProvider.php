<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            \App\Repositories\ParticipantRepository::class,
            \App\Repositories\ParticipantRepositoryEloquent::class
        );
        $this->app->bind(
            \App\Repositories\ActivityRepository::class,
            \App\Repositories\ActivityRepositoryEloquent::class
        );
        $this->app->bind(\App\Repositories\ClientRepository::class, \App\Repositories\ClientRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ActivityHasParticipantRepository::class, \App\Repositories\ActivityHasParticipantRepositoryEloquent::class);
        //:end-bindings:
    }
}
