<?php

namespace App\Http\Controllers;

use App\Interfaces\UserManagementRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    protected UserManagementRepositoryInterface $userManagementRepository;

    public function __construct(UserManagementRepositoryInterface $userManagementRepository)
    {
        $this->middleware('role:admin');
        $this->userManagementRepository = $userManagementRepository;
    }

    public function users(Request $request) : View
    {
        $users = $this->userManagementRepository->getAllUsers($request->searchQuery);
        return view('portal.users',compact('users'));
    }
}
