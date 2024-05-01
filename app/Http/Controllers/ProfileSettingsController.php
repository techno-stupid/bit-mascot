<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdatePasswordRequest;
use App\Interfaces\ProfileSettingsRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileSettingsController extends Controller
{
    protected ProfileSettingsRepositoryInterface $profileSettingsRepository;

    public function __construct(ProfileSettingsRepositoryInterface $profileSettingsRepository)
    {
        $this->middleware('auth');
        $this->profileSettingsRepository = $profileSettingsRepository;
    }

    public function profile() : View
    {
        $user = Auth::user();
        return view('portal.profile',compact('user'));
    }

    public function changePassword() : View
    {
        return view('portal.change-password');
    }

    public function updatePassword(UpdatePasswordRequest $request) : RedirectResponse
    {
        $updatePassword = $this->profileSettingsRepository->updatePassword($request->all());
        if(!$updatePassword['status'])  return redirect()->back()->with('error', 'Current password is incorrect');
        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
