<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        Skill::all()->each(function ($skill) use ($users) {
            $users->random(rand(1, 3))->each(function ($user) use ($skill) {
                $user->skills()->attach($skill);
            });
        });
    }
}
