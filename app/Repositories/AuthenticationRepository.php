<?php

namespace App\Repositories;

use App\Constants\UserRoles;
use App\Interfaces\AuthenticationRepositoryInterface;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    public function register(array $data) :void
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        event(new Registered($user));
        $user->assignRole(UserRoles::USER);
        Auth::login($user);
    }

    public function emailAvailabilityCheck(string $email) : array
    {
        $available = !User::where('email', $email)->exists();
        return [
            'available' => $available,
            'message' => $available ? 'Available' : 'Email is already taken',
            'color' => $available ? 'green' : 'red',
        ];
    }
}
