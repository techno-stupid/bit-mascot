<?php

namespace App\Http\Controllers;

use App\Interfaces\ProfileSettingsRepositoryInterface;
use App\Interfaces\UserManagementRepositoryInterface;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    protected UserManagementRepositoryInterface $userManagementRepository;

    public function __construct(UserManagementRepositoryInterface $userManagementRepository)
    {
        $this->middleware('role:admin');
        $this->userManagementRepository = $userManagementRepository;
    }

    public function users(Request $request)
    {
        $users = $this->userManagementRepository->getAllUsers($request->searchQuery);
        return view('panel.users',compact('users'));
    }
}
