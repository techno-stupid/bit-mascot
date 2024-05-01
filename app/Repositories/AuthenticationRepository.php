<?php

namespace App\Repositories;

use App\Constants\UserRoles;
use App\Interfaces\AuthenticationRepositoryInterface;
use App\Jobs\SendOtpMail;
use App\Models\User;
use App\Traits\RepositoryResponseTrait;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationRepository implements AuthenticationRepositoryInterface
{
    use RepositoryResponseTrait;
    public function register(array $data) :void
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        event(new Registered($user));
        $user->assignRole(UserRoles::USER);
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

    public function sendOtp(string $email) : void
    {
        $user = User::where('email', $email)->first();
        $user->otp = rand(100000, 999999);
        $user->update();
        SendOtpMail::dispatch($user);
    }

    public function verifyOtp(string $otp): array
    {
        $email = Session::get('email');
        $user = User::where('email', $email)->first();
        if($user->otp == $otp) {
            $user->update(['otp' => null]);
            Auth::login($user, true);
            Session::forget('email');
            return $this->successResponse('Success');
        }
        return $this->errorResponse('Invalid OTP. Please try again.',null, 422);
    }
}
