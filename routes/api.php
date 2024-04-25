<?php

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

require __DIR__.'/config/config.php';
require __DIR__.'/user/user.php';
require __DIR__.'/category/category.php';
require __DIR__.'/course/course.php';
require __DIR__.'/Auth/Auth.php';
require __DIR__.'/transaction/transaction.php';
