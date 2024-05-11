<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image'            => 'https://picsum.photos/300/300',
            'city'             => fake()->city(),
            'make'             => fake()->word(),
            'model'            => fake()->word(),
            'description'      => fake()->sentence(),
            'year'             => fake()->year(),
            'mileage'          => fake()->numberBetween(0, 100000),
            'type_of_exchange' => fake()->randomElement(['manual', 'automatic']),
            'phone'            => fake()->phoneNumber(),
            'price'            => fake()->numberBetween(1000, 100000),

        ];
    }
}
