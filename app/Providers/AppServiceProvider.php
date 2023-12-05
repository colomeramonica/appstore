<?php

namespace App\Providers;

use App\Interfaces\AppRepositoryInterface;
use App\Repositories\AppRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AppRepositoryInterface::class, AppRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
