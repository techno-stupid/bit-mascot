<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Interfaces\AuthenticationRepositoryInterface;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    protected AuthenticationRepositoryInterface $authenticationRepository;

    public function __construct(AuthenticationRepositoryInterface $authenticationRepository)
    {
        $this->middleware('guest');
        $this->authenticationRepository = $authenticationRepository;
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(RegistrationRequest $request)
    {
        $this->authenticationRepository->register($request->all());
        return redirect('/');
    }

    //emailAvailability
    public function emailAvailability(Request $request)
    {
        $response = $this->authenticationRepository->emailAvailabilityCheck($request->email);
        return response()->json($response);
    }
}
