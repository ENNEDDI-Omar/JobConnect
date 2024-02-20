<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'User_access',
            ],
            [
                'name' => 'User_edit',
            ],
            [
                'name' => 'User_delete',
            ],
            [
                'name' => 'User_create',
            ]
        ];

        foreach ($permissions as $permission){
            Permission::create($permission);
        }
    }
}
