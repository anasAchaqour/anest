<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'supplier_id' => $this->faker->numberBetween(1, 10), // Assuming you have 5 suppliers
            'category_id' => $this->faker->numberBetween(1, 10), // Assuming you have 5 categories
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock' => $this->faker->numberBetween(10, 100),
            'pro_pic' => 'product/default.png', // Replace with appropriate logic for product pictures
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
