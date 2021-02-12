<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;

Route::prefix('admin')->group(function () {
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans/{id}', [PlanController::class, 'show'])->name('plans.show');
    Route::delete('plans/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::get('/', [PlanController::class, 'index'])->name('index');
    Route::get('plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('plans/{id}', [PlanController::class, 'update'])->name('plans.update');
});




Route::get('/', function () {
    return view('welcome');
});
