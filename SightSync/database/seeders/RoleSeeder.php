<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin', 'description' => 'System administrator with full access'],
            ['name' => 'Director', 'description' => 'Can manage companies and sites'],
            ['name' => 'Manager', 'description' => 'Can manage sites and departments'],
            ['name' => 'Supervisor', 'description' => 'Can manage departments and rooms'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
