<?php

namespace App\Services\Otp;

use App\Models\OtpLog;

class MakeOtp
{
    public static function createOtp($user_id)
    {
        $OTP = rand(10000, 99999);
        OtpLog::create([
            'user_id' => $user_id,
            'otp' => $OTP,
            'otp_expiry'=>now()->addMinutes(3),
        ]);

        return $OTP;
    }

}
