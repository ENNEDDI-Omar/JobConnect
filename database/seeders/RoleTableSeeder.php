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
                'name' => 'Representant',
            ],
            [
                'name' => 'Recruiter',
            ],
            [
                'name' => 'User',
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
