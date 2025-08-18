<?php

namespace App\DTO\Auth;

class SendOtpDTO
{
    public string $phone;

    public function  __construct(array $data)
    {
        $this->phone = $data['phone'];
    }
}
