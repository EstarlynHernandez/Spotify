<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'duration' => 0,
            'description' => fake()->paragraph(),
            'gender_id' => random_int(1, 8),
            'url' => random_int(1, 100),
            'song_text' => fake()->paragraph(),
            'img_url' => false,
            'listeners' => 0,
            'launch_date' => now(),
        ];
    }
}
