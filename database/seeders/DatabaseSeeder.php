<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            PermissionRoleTableSeeder::class,
            SkillTableSeeder::class,
            UserTableSeeder::class,
            CompanyTableSeeder::class,
            SkillUserTableSeeder::class,
            CategoryTableSeeder::class,
            OfferTableSeeder::class,
            ApplicationTableSeeder::class,
            TestimonialTableSeeder::class,
            EducationTableSeeder::class,
            ExperienceTableSeeder::class,
            
        ]);
    }
}
