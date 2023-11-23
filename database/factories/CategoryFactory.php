<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
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
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->sentence,
            // 'cat_pic' => $this->faker->imageUrl(), // Replace with appropriate logic for category pictures
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
