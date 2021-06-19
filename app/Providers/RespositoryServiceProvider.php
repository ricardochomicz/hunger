<?php

namespace App\Providers;

use App\Repositories\{
    CategoryRepository,
    ClientRepository,
    CompanyRepository,
    ProductRepository,
    TableRepository
};

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    ClientRepositoryInterface,
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

        $this->app->bind(
            ClientRepositoryInterface::class,
            ClientRepository::class
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
