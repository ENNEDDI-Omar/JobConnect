<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'User',
            ],
            [
                'name' => 'Recruiter',
            ],
            [
                'name' => 'Representant',
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
