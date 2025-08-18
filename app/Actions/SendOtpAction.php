<?php

namespace App\Actions;

use App\DTO\Auth\SendOtpDTO;
use App\Models\User;

class SendOtpAction
{
    public function execute(SendOtpDTO $dto)
    {
        $otp = rand(100000, 999999);
        $user = User::firstOrCreate(['phone' => $dto->phone]);

        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinute()
        ]);

        return $user;
    }
}
