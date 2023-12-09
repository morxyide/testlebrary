<?php

namespace Database\Factories;

use App\Models\CD;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CD>
 */
class CDFactory extends Factory
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
            'artist' => $this->faker->name,
            'publisher' => $this->faker->company,
            'year_published' => $this->faker->year,
            'category' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
