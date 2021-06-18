<?php

namespace App\Providers;

use App\Repositories\CompanyRepository;
use App\Repositories\Contracts\CompanyRepositoryInterface;
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
