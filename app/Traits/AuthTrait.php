<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait AuthTrait
{
    private function checkPassword($user, $password): bool
    {
        return !Hash::check($password, $user->password);
    }
}
