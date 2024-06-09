<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tweet>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->company,
            'image' => $this->faker->imageUrl(640, 480, 'food', true),
            'category' => $this->faker->randomElement(['chinese', 'indian', 'italian', 'japanese', 'mexican', 'thai', 'vietnamese']),
            'description' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'maxPax' => $this->faker->numberBetween(1, 100),

        ];
    }
}
