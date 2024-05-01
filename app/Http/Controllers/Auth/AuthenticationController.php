<?php

namespace App\Http\Controllers\Auth;

use App\Constants\UserRoles;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\OtpSubmissionRequest;
use App\Interfaces\AuthenticationRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticationController extends Controller
{
    protected AuthenticationRepositoryInterface $authenticationRepository;

    public function __construct(AuthenticationRepositoryInterface $authenticationRepository)
    {
        $this->middleware('guest')->only(['login', 'loginSubmit']);
        $this->middleware('auth')->only(['logout']);
        $this->authenticationRepository = $authenticationRepository;
    }
    public function login() : View
    {
        return view('auth.login');
    }

    public function loginSubmit(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->hasRole(UserRoles::ADMIN)) return redirect()->route('dashboard');
            $this->loginProcessForUser($request);
            return redirect()->route('auth.otp');
        }
        return back()->withInput()->withErrors([
            'wrong_credentials' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }

    public function otp()
    {
        if(!Session::has('email')) {
            return redirect()->route('auth.login');
        }
        return view('auth.otp');
    }

    public function otpSubmit(OtpSubmissionRequest $request) : RedirectResponse
    {
        $this->authenticationRepository->verifyOtp($request->otp);
        if(Auth::check()) return redirect()->route('dashboard');
        return back()->withErrors([
            'wrong_credentials' => 'Invalid OTP. Please try again.',
        ]);
    }

    private function loginProcessForUser($request) : void
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $this->authenticationRepository->sendOtp($request->email);
        Session::put('email', $request->email);
    }
}
