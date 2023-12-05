<?php

namespace App\Providers;

use App\Interfaces\DeveloperRepositoryInterface;
use App\Repositories\DeveloperRepository;
use Illuminate\Support\ServiceProvider;

class DeveloperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DeveloperRepositoryInterface::class, DeveloperRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
