<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Interfaces\ProfileSettingsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileSettingsController extends Controller
{
    protected ProfileSettingsRepositoryInterface $profileSettingsRepository;

    public function __construct(ProfileSettingsRepositoryInterface $profileSettingsRepository)
    {
        $this->middleware('auth');
        $this->profileSettingsRepository = $profileSettingsRepository;
    }

    //profile
    public function profile()
    {
        $user = Auth::user();
        return view('panel.profile',compact('user'));
    }

    public function changePassword()
    {
        return view('panel.change-password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $updatePassword = $this->profileSettingsRepository->updatePassword($request->all());
        if(!$updatePassword['status'])  return redirect()->back()->with('error', 'Current password is incorrect');
        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
