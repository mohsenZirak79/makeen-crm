<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::prefix('transactions')->controller(TransactionController::class)
    ->middleware('auth:sanctum')
    ->group(function () {

        Route::get('/', 'index')->name('transactions.index');

        Route::get('/{transaction}', 'show')->name('transactions.show')
            ->missing(function () {
                return response()->json([
                    'message' => 'Transaction Not Found.'
                ], 404);
            });

        Route::post('/', 'store')->name('transactions.store');

        Route::put('/{transaction}', 'update')->name('transactions.update');

        Route::delete('/{transaction}', 'destroy')->name('transactions.destroy')
            ->missing(function () {
                return response()->json([
                    'message' => 'Transaction Not Found.'
                ], 404);
            });

        Route::patch('/{transaction}/status', 'changePaymentStatus')->name('transactions.changeStatus')
            ->missing(function () {
                return response()->json([
                    'message' => 'Transaction Not Found.'
                ], 404);
            });
    });