<?php

use App\Http\Controllers\PropertyAnalyticController;
use App\Http\Controllers\PropertyController;
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

Route::prefix('properties')->group(function() {
    Route::get('',                                          [PropertyController::class, 'index']);
    Route::post('',                                         [PropertyController::class, 'create']);
    Route::get('summary',                                   [PropertyController::class, 'summary']);
    Route::get('{property}/analytics',                      [PropertyAnalyticController::class, 'index']);
    Route::post('{property}/analytics',                     [PropertyAnalyticController::class, 'create']);
    Route::put('{property}/analytics/{propertyAnalytic}',   [PropertyAnalyticController::class, 'update']);
});
