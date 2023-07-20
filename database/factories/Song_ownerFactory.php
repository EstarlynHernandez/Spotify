<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song_owner>
 */
class Song_ownerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(1, 10),
            'song_id' => fake()->randomElement(range(1, 120)),
            'album_id' => fake()->randomElement(range(1, 15)),
        ];
    }
}
