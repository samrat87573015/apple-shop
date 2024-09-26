<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => fake()->unique()->numberBetween(1, 20),
            'description' => fake()->text(),
            'image1' => fake()->imageUrl(),
            'image2' => fake()->imageUrl(),
            'image3' => fake()->imageUrl(),
            'image4' => fake()->imageUrl(),
            'color' => 'red, green, blue',
            'size' => 'XS, S, M, L, XL'
        ];
    }
}
