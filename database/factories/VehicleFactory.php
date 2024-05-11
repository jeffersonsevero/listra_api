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
            'image'            => "https://storage.googleapis.com/golden-wind/ignite/react-native/thumbnails/" . fake()->numberBetween(1, 5) . ".png",
            'city'             => fake()->city(),
            'make'             => fake()->randomElement(['Volkswagen', 'Audi', 'BMW']),
            'model'            => fake()->randomElement(['Golf', 'Passat', 'Tiguan', 'Touareg', 'Jetta', 'Polo']),
            'description'      => fake()->sentence(),
            'year'             => fake()->year(),
            'mileage'          => fake()->numberBetween(0, 100000),
            'type_of_exchange' => fake()->randomElement(['manual', 'automatic']),
            'phone'            => fake()->phoneNumber(),
            'price'            => fake()->numberBetween(5000000, 50000000),

        ];
    }
}
