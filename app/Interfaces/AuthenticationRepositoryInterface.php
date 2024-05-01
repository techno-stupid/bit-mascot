<?php

namespace App\Interfaces;

interface AuthenticationRepositoryInterface
{
    public function register(array $data);

    public function emailAvailabilityCheck(string $email);

    public function sendOtp(string $email);

    public function verifyOtp(string $otp);
}
