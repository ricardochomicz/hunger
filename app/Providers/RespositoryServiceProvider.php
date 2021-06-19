<?php

namespace App\Providers;

use App\Repositories\{
    CategoryRepository,
    CompanyRepository,
    ProductRepository,
    TableRepository
};

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    CompanyRepositoryInterface,
    ProductRepositoryInterface,
    TableRepositoryInterface
};

use Illuminate\Support\ServiceProvider;

class RespositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CompanyRepositoryInterface::class,
            CompanyRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            TableRepositoryInterface::class,
            TableRepository::class
        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
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
