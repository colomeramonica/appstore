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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->singleton(AppRepositoryInterface::class, function () {
            return app(AppRepository::class);
        });
    }
}
