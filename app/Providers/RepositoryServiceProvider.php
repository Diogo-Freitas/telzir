<?php

namespace App\Providers;

use App\Services\CallService;
use App\Repositories\PlanRepository;
use App\Repositories\RateRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\CallServiceInterface;
use App\Interfaces\PlanRepositoryInterface;
use App\Interfaces\RateRepositoryInterface;
use App\Repositories\DirectDistanceDialingRepository;
use App\Interfaces\DirectDistanceDialingRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DirectDistanceDialingRepositoryInterface::class, DirectDistanceDialingRepository::class);
        $this->app->bind(RateRepositoryInterface::class, RateRepository::class);
        $this->app->bind(PlanRepositoryInterface::class, PlanRepository::class);
        $this->app->bind(CallServiceInterface::class, CallService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
