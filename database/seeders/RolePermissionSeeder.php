<?php

namespace Database\Seeders;

use App\Constants\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPUnit\TextUI\Configuration\Constant;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createRoles();
        $this->createAdmin();
    }

    protected function createRoles(): void
    {
        Role::create(['name' => UserRoles::ADMIN]);
        Role::create(['name' => UserRoles::USER]);
    }
    protected function createAdmin(): void
    {
        $user = [
            'first_name' => 'Mr.',
            'last_name' => 'Admin',
            'email' => 'admin@localhost.local',
            'phone' => '1234567890',
            'address' => 'Dhaka,Bangladesh',
            'date_of_birth' => '1971-12-16',
            'password' => Hash::make('admin')
        ];

        $user = User::create($user);
        $user->assignRole([UserRoles::ADMIN]);
    }
}
