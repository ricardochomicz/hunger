<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Plan;
use App\Models\Product;
use App\Observers\CategoryObserver;
use App\Observers\CompanyObserver;
use App\Observers\PlanObserver;
use App\Observers\ProductObserver;
use App\Repositories\CompanyRepository;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Plan::observe(PlanObserver::class);
        Company::observe(CompanyObserver::class);
        Category::observe(CategoryObserver::class);
        Product::observe(ProductObserver::class);
    }
}
