<?php

use App\Http\Controllers\ResetPassword\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('/resetPassword')->group(function () {
      Route::POST('', [ResetPasswordController::class, 'index'])->name('resetPassword');
      Route::GET('/userPhoneNumber', [ResetPasswordController::class, 'getUser'])->middleware('auth.reset')->name('resetPassword.userPhoneNumber');
      Route::post('/checkOTP', [ResetPasswordController::class, 'verifyOtp'])->middleware('auth.reset')->name('resetPassword.checkOTP');
      Route::post('/reset', [ResetPasswordController::class, 'reset'])->middleware(['auth.reset','otp.check'])->name('resetPassword.reset');
});
