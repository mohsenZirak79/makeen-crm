<?php

namespace App\Services\PersonalResetPasswordToken;

use App\Models\PersonalResetPasswordToken;
use Illuminate\Support\Str;

class ResetPasswordToken
{
    public static function generateToken($user): string
    {
       $PersonalToken =  PersonalResetPasswordToken::where('user_id', $user->id)->first();
       if (!$PersonalToken) {
           $token = Str::random(64);

           $user->tokens()->create([
               'token' => hash('sha256', $token),
           ]);

           return $token;
       }
       return $PersonalToken->token;
    }
}
