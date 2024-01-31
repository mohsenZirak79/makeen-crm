<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\User\StudentController;

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
Route::prefix('/student/')->name('student.')->group(function () {

    Route::post('create', [StudentController::class, 'create'])->name('create');
    Route::put('edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [StudentController::class, 'update'])->name('update');
    Route::get('Show/{id}', [StudentController::class, 'show'])->name('show');
    Route::delete('destroy', [StudentController::class, 'destroy'])->name('destroy');

});
