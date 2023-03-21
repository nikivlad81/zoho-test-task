<?php

use App\Http\Controllers\Api\Auth\CustomerController;
use App\Http\Controllers\DealController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('customers')->as('customers.')->controller(CustomerController::class)->group(function () {
    Route::get('contacts', 'index')->name('index');
    Route::get('contacts/create', 'create')->name('create');
    Route::post('contacts/store', 'store')->name('store');
});

Route::prefix('deals')->as('deals.')->controller(DealController::class)->group(function () {
    Route::get('deals', 'index')->name('index');
    Route::get('deals/create', 'create')->name('create');
    Route::post('deals/store', 'store')->name('store');
});
