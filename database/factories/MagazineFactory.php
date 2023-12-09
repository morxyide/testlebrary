<?php

namespace Database\Factories;

use App\Models\Magazine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Magazine>
 */
class MagazineFactory extends Factory
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
            'publisher' => $this->faker->company,
            'issn' => $this->faker->unique()->isbn13,
            'edition' => $this->faker->randomDigit,
            'year_published' => $this->faker->year,
            'category' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
