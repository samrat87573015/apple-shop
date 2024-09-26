<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerProfile>
 */
class CustomerProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cus_name' => fake()->name(),
            'cus_city' => fake()->city(),
            'cus_state' => fake()->state(),
            'cus_address' => fake()->address(),
            'cus_postcode' => fake()->postcode(),
            'cus_country' => fake()->country(),
            'cus_phone' => fake()->phoneNumber(),
            'cus_fax' => fake()->phoneNumber(),
            'ship_name' => fake()->name(),
            'ship_city' => fake()->city(),
            'ship_state' => fake()->state(),
            'ship_address' => fake()->address(),
            'ship_postcode' => fake()->postcode(),
            'ship_country' => fake()->country(),
            'ship_phone' => fake()->phoneNumber(),
            'ship_fax' => fake()->phoneNumber(),
            'user_id' => fake()->unique()->numberBetween(1, 10),
        ];
    }
}
