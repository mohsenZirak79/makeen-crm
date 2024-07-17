<?php

namespace App\Http\Controllers\ResetPassword;

use App\Http\Controllers\Controller;
use App\Models\OtpLog;
use App\Models\PersonalResetPasswordToken;
use App\Models\User;
use App\Services\Otp\MakeOtp;
use App\Services\PersonalResetPasswordToken\ResetPasswordToken;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'national_id' => 'required|string',
        ]);

        $user = User::where('national_id', $request->national_id)->first();

        if (!$user)
        {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

       $token =  ResetPasswordToken::generateToken($user);

       $OtpLog =  OtpLog::where('user_id', $user->id)->first();
       if (!$OtpLog){
           $OTP = MakeOtp::createOtp($user->id);
       }else{
           $OTP = $OtpLog->OTP;
       }

        //otp event

        return response()->json(['token' => $token , 'otp' => $OTP]);
    }


    public function getUser(Request $request): \Illuminate\Http\JsonResponse
    {
       return response()->json($request->user->phone_number);
    }



    public function verifyOtp(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'otp' => 'required|string',
        ]);

       $OtpLog =  OtpLog::where('user_id' , $request->user->id)->first();

        if (!$OtpLog){
            return response()->json(['message' => 'OTP expired'], 401);
         }

        if ($OtpLog->otp_expiry <= now()) {
             $OtpLog->delete();
             return response()->json(['message' => 'OTP expired'], 401);
          }

        if ($OtpLog->OTP !== $request->otp) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $OtpLog->delete();

        PersonalResetPasswordToken::where('user_id' , $request->user->id)->update([
            'OTP_verified_at'=>now()
        ]);

        return response()->json(['message' => 'success'], 200);
    }

    public function resetPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([]);
    }
}
