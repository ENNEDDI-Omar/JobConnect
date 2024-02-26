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
                'name' => 'Profil_access',
            ],
            [
                'name' => 'Profil_edit',
            ],
            [
                'name' => 'Profil_delete',
            ],
            [
                'name' => 'Profil_create',
            ],
            [
                'name' => 'Offer_access',
            ],
            [
                'name' => 'Offer_edit',
            ],
            [
                'name' => 'Offer_delete',
            ],
            [
                'name' => 'Offer_create',
            ],
            [
                'name' => 'Company_access',
            ],
            [
                'name' => 'Company_edit',
            ],
            [
                'name' => 'Company_delete',
            ],
            [
                'name' => 'Company_create',
            ],
            [
                'name' => 'Skill_access',
            ],
            [
                'name' => 'Skill_edit',
            ],
            [
                'name' => 'Skill_delete',
            ],
            [
                'name' => 'Skill_create',
            ],
            [
                'name' => 'Apply_access',
            ],
            [
                'name' => 'Apply_edit',
            ],
            [
                'name' => 'Apply_delete',
            ],
            [
                'name' => 'Apply_create',
            ],

        ];

        foreach ($permissions as $permission){
            Permission::create($permission);
        }
    }
}
