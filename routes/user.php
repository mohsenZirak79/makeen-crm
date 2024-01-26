<?php

use App\Http\Controllers\UserController;
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
Route::prefix('user')->controller(UserController::class)->group(function () {
    Route::get('', 'index');
    Route::post('', 'store');
    Route::get('{user}', 'show')->whereNumber('user');
    Route::put('{user}', 'update')->whereNumber('user');
    Route::delete('{user}', 'destroy')->whereNumber('user');
});

