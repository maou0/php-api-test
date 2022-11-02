<?php

use App\Http\Controllers\Api\V1\Number\IndexController;
use App\Http\Controllers\Api\V1\Number\ShowController;
use App\Http\Controllers\Api\V1\Number\StoreController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('numbers', \App\Http\Controllers\Api\V1\NumberController::class)->only('show', 'store');
