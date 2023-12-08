<?php

namespace App\Providers;

use App\Http\Interfaces\CustomerInterface;
use App\Http\Interfaces\HomeInterface;
use App\Http\Interfaces\InvoiceInterface;
use App\Http\Interfaces\ProductInterface;
use App\Http\Repositories\CustomerRepository;
use App\Http\Repositories\HomeRepository;
use App\Http\Repositories\InvoiceRepository;
use App\Http\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            HomeInterface::class,
            HomeRepository::class
        );
        $this->app->bind(
            ProductInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            CustomerInterface::class,
            CustomerRepository::class
        );
        $this->app->bind(
            InvoiceInterface::class,
            InvoiceRepository::class
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
