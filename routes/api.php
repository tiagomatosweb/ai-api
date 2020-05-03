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

Route::post('/properties',                                          [PropertyController::class, 'create']);
Route::get('/properties/{property}/analytics',                      [PropertyAnalyticController::class, 'index']);
Route::post('/properties/{property}/analytics',                     [PropertyAnalyticController::class, 'create']);
Route::put('/properties/{property}/analytics/{propertyAnalytic}',   [PropertyAnalyticController::class, 'update']);
