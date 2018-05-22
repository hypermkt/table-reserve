<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\UserRepository::class
        );
        $this->app->bind(
            \App\Repositories\TableTypeRepositoryInterface::class,
            \App\Repositories\TableTypeRepository::class
        );
        $this->app->bind(
            \App\Repositories\CourseRepositoryInterface::class,
            \App\Repositories\CourseRepository::class
        );
        $this->app->bind(
            \App\Repositories\ReservationRepositoryInterface::class,
            \App\Repositories\ReservationRepository::class
        );
    }
}
