<?php

namespace App\Providers;

use App\Repositories\{
    CategoryRepository,
    ClientRepository,
    CompanyRepository,
    EvaluationRepository,
    OrderRepository,
    ProductRepository,
    TableRepository
};

use App\Repositories\Contracts\{
    CategoryRepositoryInterface,
    ClientRepositoryInterface,
    CompanyRepositoryInterface,
    EvaluationRepositoryInterface,
    OrderRepositoryInterface,
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

        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        $this->app->bind(
            EvaluationRepositoryInterface::class,
            EvaluationRepository::class
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
