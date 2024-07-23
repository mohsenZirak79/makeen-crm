<?php

namespace App\Http\Middleware;

use App\Models\PersonalResetPasswordToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordCkeck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $Otp_verification = PersonalResetPasswordToken::where('user_id' , $request->user->id)->first();

        if ($Otp_verification !== null) {
            return $next($request);
        }
        return response()->json(['OTP Not Verified']);
    }
}
