<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('category')->middleware('auth:sanctum')->group(function () {
    Route::get('/{type}', [CategoryController::class, 'getCategories'])
        ->where('type', 'subcategory|main|all');
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/{category}', [CategoryController::class, 'show']);
    Route::put('/{category}', [CategoryController::class, 'update']);
    Route::delete('/{category}', [CategoryController::class, 'destroy']);
    Route::get('/{category}/subcategories', [CategoryController::class, 'getSubcategories']);
});
