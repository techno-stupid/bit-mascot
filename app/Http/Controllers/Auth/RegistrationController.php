<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Interfaces\AuthenticationRepositoryInterface;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    use FileUploadTrait;
    protected AuthenticationRepositoryInterface $authenticationRepository;

    public function __construct(AuthenticationRepositoryInterface $authenticationRepository)
    {
        $this->authenticationRepository = $authenticationRepository;
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(RegistrationRequest $request)
    {
        $requestData = array_merge($request->all(), ['id_verification' => $this->uploadFile($request->file('nid_file'))]);
        $this->authenticationRepository->register($requestData);
        return redirect()->route('auth.login');
    }

    public function emailAvailability(Request $request)
    {
        $response = $this->authenticationRepository->emailAvailabilityCheck($request->email);
        return response()->json($response);
    }
}
