<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->jobTitle,
            'type' => $this->faker->randomElement(['full-time', 'part-time', 'internship']),
            'company' => $this->faker->company,
            'start_date' => $this->faker->dateTimeBetween('-10 years', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'description' => $this->faker->paragraph,
        ];
    }
}
