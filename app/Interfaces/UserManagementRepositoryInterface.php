<?php

namespace App\Interfaces;

interface UserManagementRepositoryInterface
{
    public function getAllUsers($searchQuery = null);
}
