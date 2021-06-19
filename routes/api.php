<?php

use App\Http\Controllers\Api\{
    CategoryApiController,
    CompanyApiController,
    ProductApiController,
    TableApiController
};
use App\Http\Controllers\Api\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'v1'
], function () {
    Route::get('/companies/{uuid}', [CompanyApiController::class, 'show']);
    Route::get('/companies', [CompanyApiController::class, 'index']);

    Route::get('/categories/{url}', [CategoryApiController::class, 'show']);
    Route::get('/categories', [CategoryApiController::class, 'getCategoryByCompany']);

    Route::get('/tables/{identify}', [TableApiController::class, 'show']);
    Route::get('/tables', [TableApiController::class, 'getTablesByCompany']);

    Route::get('/products/{url}', [ProductApiController::class, 'show']);
    Route::get('/products', [ProductApiController::class, 'getProductsByCompany']);

    Route::get('/client/{id}', [RegisterController::class, 'show']);
    Route::post('/client', [RegisterController::class, 'store']);
});
