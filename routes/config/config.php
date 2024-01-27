<?php

use App\Http\Controllers\ConfigController;
use Illuminate\Support\Facades\Route;


Route::prefix('config')->controller(ConfigController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/update', 'update');
});