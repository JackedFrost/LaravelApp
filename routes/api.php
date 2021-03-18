<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Birthday;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//show all of the birthdays to whoever wants to pull from the api

Route::middleware('auth:sanctum')->get('/birthdays', function(Request $request){
    return Birthday::all();
});