<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('national_id', $request->national_id)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The username or password is incorrect.']
            ]);
        }

        $token = $user->createToken('UserToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function Logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'logout' => 'TOKEN Removed'
        ]);
    }
}
