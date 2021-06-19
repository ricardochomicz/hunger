<?php

namespace App\Providers;

use App\Repositories\{
    CategoryRepository,
    CompanyRepository,
    TableRepository
};

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    CompanyRepositoryInterface,
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
