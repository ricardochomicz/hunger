<?php

use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\DetailPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ACL\PermissionController;
use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PlanProfileController;

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {

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
