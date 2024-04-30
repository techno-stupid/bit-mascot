<?php

namespace App\Repositories;

use App\Interfaces\AuthenticationRepositoryInterface;
use App\Interfaces\ProfileSettingsRepositoryInterface;
use App\Models\User;
use App\Traits\AuthTrait;
use App\Traits\RepositoryResponseTrait;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileSettingsRepository implements ProfileSettingsRepositoryInterface
{
    use RepositoryResponseTrait,AuthTrait;
    public function updatePassword(array $data)
    {
        $user = User::find(Auth::id());
        if($this->checkPassword($user, $data['current_password']))  return $this->errorResponse('Current password is incorrect', null, 401);
        $user->password = Hash::make($data['password']);
        $user->update();
        return $this->successResponse('Password updated successfully');
    }
}
