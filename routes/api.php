<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\ClassesController;
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


Route::group(['middleware' => ['cors', 'json.response']], function () {
    // public routes

    Route::post('/register',[ApiAuthController::class, 'register'])->name('register.api');
    Route::post('/login',[ApiAuthController::class, 'login'])->name('login.api');
   
});

Route::middleware('auth:api')->group(function () {

    Route::post('/logout',[ApiAuthController::class, 'logout'])->name('logout.api');
    Route::get('/classes', [ClassesController::class, 'index'])->name('classes.index');
});
