<?php

use App\Http\Controllers\FactorController;
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
Route::group([
    'as' => 'factor.',
    'prefix' => 'factor',
    'middleware' => ['auth:sanctum']
], function () {
    Route::get('/', [FactorController::class, 'index'])->name('index');
    Route::get('/{factor}', [FactorController::class, 'show'])->name('show');
    Route::post('/{user}', [FactorController::class, 'create'])->name('create');
    Route::put('/{factor}', [FactorController::class, 'update'])->name('update');
    Route::delete('/{factor}', [FactorController::class, 'delete'])->name('delete');
});
