<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'is_public' => fake()->boolean(),
            'description' => fake()->text(100),
            'location' => fake()->text(50),
            'ticket_price' => fake()->randomFloat(2, 10, 999),
            'ticket_available' => rand(5, 20)
        ];
    }
}
