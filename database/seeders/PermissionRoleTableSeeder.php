<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_permissions =  [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];
        $user_permissions =  [1,2,3,4,13,14,15,16,17,18,19,20];
        $recruiter_permission = [1,2,3,4,5,6,7,8];
        $representant_permission = [1,2,3,4,5,6,7,8,9,10,11,12];

        Role::where('name','Admin')->firstOrFail()->permissions()->sync($admin_permissions);
        Role::where('name','User')->firstOrFail()->permissions()->sync($user_permissions);
        Role::where('name', 'Recruiter')->firstOrFail()->permissions()->sync($recruiter_permission);
        Role::where('name', 'Representant')->firstOrFail()->permissions()->sync($representant_permission);
    }
}
