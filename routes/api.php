<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Birthday;
use App\Http\Controllers\API\BirthdayController;

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

//show all of the birthdays to whoever wants to pull from the api

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('birthdays', BirthdayController::class);
            //return Birthday::all();
    });
    Route::prefix('v2')->group(function () {  
        //for future developments
    });
});