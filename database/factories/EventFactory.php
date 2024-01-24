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
            'name' => fake()->text(50),
            'is_public' => fake()->boolean(),
            'description' => fake()->text(100),
            'location' => fake()->text(50),
            'starting_date' => date_format(now(), 'Y-m-d'),
            'ending_date' => date_format(now()->addDays(rand(1, 10)), 'Y-m-d'),
            'ticket_price' => fake()->randomFloat(2, 10, 999),
            'ticket_available' => rand(5, 20)
        ];
    }
}
