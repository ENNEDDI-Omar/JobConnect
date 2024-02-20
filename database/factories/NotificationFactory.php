<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'id' => (string) \Illuminate\Support\Str::uuid(),
            'type' => 'App\Notifications\ExampleNotification',
            'notifiable_type' => User::class,
            'notifiable_id' => User::factory(),
            'data' => ['message' => $this->faker->sentence],
            'read_at' => null,
        ];
    }
}
