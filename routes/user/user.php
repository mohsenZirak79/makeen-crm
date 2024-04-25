<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\User\StudentController;
use \App\Http\Controllers\User\AdminController;
use \App\Http\Controllers\User\MentorController;

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
Route::prefix('/student/')->name('student.')->middleware('auth:sanctum')->group(function () {

    Route::post('create', [StudentController::class, 'create'])->name('create')->middleware(['permission:student.create']);
    Route::put('edit/{id}', [StudentController::class, 'edit'])->name('edit')->middleware(['permission:student.edit']);
    Route::put('update', [StudentController::class, 'update'])->name('update')->middleware(['permission:student.update']);
    Route::get('show/{id}', [StudentController::class, 'show'])->name('show')->middleware(['permission:student.show']);
    Route::delete('delete/{id}', [StudentController::class, 'delete'])->name('delete')->middleware(['permission:student.delete']);

});


Route::prefix('/Admin/')->name('Admin.')->middleware('auth:sanctum')->group(function () {

    Route::post('create', [AdminController::class, 'create'])->name('create')->middleware(['permission:admin.create']);
    Route::put('edit/{id}', [AdminController::class, 'edit'])->name('edit')->middleware(['permission:admin.edit']);
    Route::put('update', [AdminController::class, 'update'])->name('update')->middleware(['permission:admin.update']);
    Route::get('show/{id}', [AdminController::class, 'show'])->name('show')->middleware(['permission:admin.show']);
    Route::delete('delete/{id}', [AdminController::class, 'delete'])->name('delete')->middleware(['permission:admin.delete']);

});

Route::prefix('/Mentor/')->name('Mentor.')->middleware('auth:sanctum')->group(function () {

    Route::post('create', [MentorController::class, 'create'])->name('create')->middleware(['permission:mentor.create']);
    Route::put('edit/{id}', [MentorController::class, 'edit'])->name('edit')->middleware(['permission:mentor.edit']);
    Route::put('update', [MentorController::class, 'update'])->name('update')->middleware(['permission:mentor.update']);
    Route::get('show/{id}', [MentorController::class, 'show'])->name('show')->middleware(['permission:mentor.show']);
    Route::delete('delete/{id}', [MentorController::class, 'delete'])->name('delete')->middleware(['permission:mentor.delete']);

});
