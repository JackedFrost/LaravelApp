<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirthdayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//public stuff!
Route::get('/', function () {
    return view('welcome');
});

//private stuff!
Route::middleware(['auth'])-> group(function (){

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('birthdays', BirthdayController::class);
});
require __DIR__.'/auth.php';
