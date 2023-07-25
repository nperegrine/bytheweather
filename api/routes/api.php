<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCoordinateController;
use App\Http\Controllers\UserWeatherController;
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

/**
 * BY THE WEATHER API ROUTES
 */

Route::prefix('users')->group(function() { 
    # Users API
    Route::controller(UserController::class)->group(function () {
        Route::get('/', 'list')->name('users.index');
        Route::post('/', 'store')->name('users.store');
        Route::get('/{user}', 'show')->name('users.show');
        Route::post('/{user}/update', 'update')->name('users.update');
        Route::delete('/{user}/delete', 'destroy')->name('users.delete');
    });

    # Users Place API
    Route::controller(UserCoordinateController::class)->group(function () {
        Route::get('/{user}/coordinates', 'show')->name('users.coordinates');
    });

    # Users Weather API
    Route::controller(UserWeatherController::class)->group(function () {
        Route::get('/{user}/weather', 'show')->name('users.weather');
    });
});