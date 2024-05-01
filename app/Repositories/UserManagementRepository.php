<?php

namespace App\Repositories;

use App\Constants\UserRoles;
use App\Interfaces\UserManagementRepositoryInterface;
use App\Models\User;

class UserManagementRepository implements UserManagementRepositoryInterface
{

    public function getAllUsers($searchQuery = null)
    {
        return User::role(UserRoles::USER)
//            ->where('first_name', 'like', '%' . $searchQuery . '%')
//            ->orWhere('last_name', 'like', '%' . $searchQuery . '%')
//            ->orWhere('email', 'like', '%' . $searchQuery . '%')
//            ->orWhere('phone', 'like', '%' . $searchQuery . '%')
            ->get();
    }
}
