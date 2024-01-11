<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {
        $uniqueUserId = \App\Models\User::where('role', 1)->pluck('id')->unique()->random();

        return [
            'user_id' => $uniqueUserId,
            'contact' => $this->faker->phoneNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
