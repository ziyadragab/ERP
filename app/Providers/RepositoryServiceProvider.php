<?php

namespace App\Providers;

use App\Http\Interfaces\SafeInterface;
use App\Http\Repositories\SafeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
             SafeInterface::class,
             SafeRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
