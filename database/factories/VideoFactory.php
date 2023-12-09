<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            //'title' => fake()->sentence(),
            'director' => $this->faker->name,
            'producer' => $this->faker->company,
            'year_published' => $this->faker->year,
            'category' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
