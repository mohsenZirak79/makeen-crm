<?php

namespace App\Http\Middleware;

use App\Models\PersonalResetPasswordToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordWithToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $tokenModel = PersonalResetPasswordToken::where('token', hash('sha256', $token))->first();

        if (!$tokenModel) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $request->user = $tokenModel->user;

        return $next($request);
    }
}
