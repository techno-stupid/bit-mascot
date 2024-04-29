<?php

namespace App\Interfaces;

interface AuthenticationRepositoryInterface
{
    public function register(array $data);

    public function emailAvailabilityCheck(string $email);
}
