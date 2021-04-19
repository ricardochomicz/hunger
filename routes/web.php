<?php

use App\Http\Controllers\Admin\ACL\RoleController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\DetailPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PermissionRoleController;
use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryProductController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CompanyController;

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {

        /**
         * Route Permission x Role
         */
        Route::get('roles/{id}/permission/{idPermission}/detach', [PermissionRoleController::class, 'detachPermissionRole'])->name('roles.permission.detach');
        Route::post('roles/{id}/permissions', [PermissionRoleController::class, 'attachPermissionsRole'])->name('roles.permissions.attach');
        Route::any('roles/{id}/permissions/create', [PermissionRoleController::class, 'permissionsAvailable'])->name('roles.permissions.available');
        Route::get('roles/{id}/permissions', [PermissionRoleController::class, 'permissions'])->name('roles.permissions');
        Route::get('permissions/{id}/role', [PermissionRoleController::class, 'roles'])->name('permission.roles');


        /**
         * Route Roles
         */
        Route::any('roles/search', [RoleController::class, 'search'])->name('roles.search');
        Route::resource('roles', RoleController::class);


        /**
         * Route Company
         */
        Route::resource('companies', CompanyController::class);


         /**
         * Route Users
         */
        Route::any('users/search', [UserController::class, 'search'])->name('users.search');
        Route::resource('users', UserController::class);

         /**
         * Route Tables
         */
        Route::any('tables/search', [TableController::class, 'search'])->name('tables.search');
        Route::resource('tables', TableController::class);


        /**
         * Route Category x Product
         */

        Route::get('products/{id}/category/{idCategories}/detach', [CategoryProductController::class, 'detachCategoryProduct'])->name('products.categories.detach');
        Route::post('products/{id}/categories', [CategoryProductController::class, 'attachCategoriesProduct'])->name('products.categories.attach');
        Route::any('products/{id}/categories/create', [CategoryProductController::class, 'categoriesAvailable'])->name('products.categories.available');
        Route::get('products/{id}/categories', [CategoryProductController::class, 'categories'])->name('products.categories');
        Route::get('categories/{id}/products', [CategoryProductController::class, 'products'])->name('categories.products');



        /**
         * Route Categories
         */
        Route::any('categories/search', [CategoryController::class, 'search'])->name('categories.search');
        Route::resource('categories', CategoryController::class);

        /**
         * Route Products
         */
        Route::any('products/search', [ProductController::class, 'search'])->name('products.search');
        Route::resource('products', ProductController::class);


        /**
         * Route Plan x Profile
         */

        Route::get('plans/{id}/plan/{idProfile}/detach', [PlanProfileController::class, 'detachPlanProfile'])->name('plans.profile.detach');
        Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachPlansProfile'])->name('plans.profiles.attach');
        Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
        Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
        Route::get('profiles/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');



        /**
         * Route Permission x Profile
         */
        Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permission.detach');
        Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
        Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
        Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
        Route::get('permissions/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permission.profiles');

        /**
         * Route Permissions
         */
        Route::any('permissions/search', [PermissionController::class, 'search'])->name('permissions.search');
        Route::resource('permissions', PermissionController::class);


        /**
         * Route Profiles
         */
        Route::any('profiles/search', [ProfileController::class, 'search'])->name('profiles.search');
        Route::resource('profiles', ProfileController::class);

        /**
         * Routes Detail Plan
         */
        Route::get('plans/{id}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
        Route::delete('plans/{id}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
        Route::get('plans/{id}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');
        Route::put('plans/{id}/details/{idDetail}/update', [DetailPlanController::class, 'update'])->name('details.plan.update');
        Route::get('plans/{id}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');

        Route::post('plans/{id}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');

        Route::get('plans/{id}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');

        /**
         * Route Plans
         */
        Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
        Route::put('plans/{id}', [PlanController::class, 'update'])->name('plans.update');
        Route::get('plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
        Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
        Route::delete('plans/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');
        Route::get('plans/{id}', [PlanController::class, 'show'])->name('plans.show');
        Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
        Route::get('plans', [PlanController::class, 'index'])->name('plans.index');

        Route::get('/', [PlanController::class, 'index'])->name('admin.index');
    });

/**
 * Site 
 */
Route::get('/plan/{id}', [App\Http\Controllers\Site\SiteController::class, 'plan'])->name('plan.subscription');
Route::get('/', [App\Http\Controllers\Site\SiteController::class, 'index'])->name('site.home');

/**
 * Auth Routes
 */
Auth::routes();

//Auth::routes(['register' => false])
