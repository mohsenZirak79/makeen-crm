<?php

use App\Http\Controllers\ResetPassword\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::POST('/resetPassword', [ResetPasswordController::class, 'index'])->name('resetPassword');
Route::GET('/resetPassword/userPhoneNumber', [ResetPasswordController::class, 'getUser'])->middleware('auth.reset')->name('resetPassword.userPhoneNumber');
Route::post('/resetPassword/checkOTP', [ResetPasswordController::class, 'verifyOtp'])->middleware('auth.reset')->name('resetPassword.checkOTP');
