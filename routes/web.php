<?php

use App\Http\Controllers\Admin\DetailPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;

Route::prefix('admin')->group(function () {

    /**
     * Routes Detail Plan
     */
    Route::get('plans/{id}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
    Route::get('plans/{id}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
    Route::post('plans/{id}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::get('plans/{id}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
    Route::put('plans/{id}/details/{idDetail}/update', [DetailPlanController::class, 'update'])->name('details.plan.update');
    Route::get('plans/{id}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');
    Route::delete('plans/{id}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');


    /**
     * Route Plans
     */
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans/{id}', [PlanController::class, 'show'])->name('plans.show');
    Route::delete('plans/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
    Route::get('plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('plans/{id}', [PlanController::class, 'update'])->name('plans.update');
});


Route::get('/', function () {
    return view('welcome');
});
