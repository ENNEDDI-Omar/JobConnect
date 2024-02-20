<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recruiter_id' => User::factory(),
            'representant_id' => User::factory(),
            'name' => $this->faker->company,
            'industry' => $this->faker->word,
            'capital' => $this->faker->randomNumber(5),
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
        ];
    }
}
