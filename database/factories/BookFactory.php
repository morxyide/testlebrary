<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
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
            'author' => $this->faker->name,
            'publisher' => $this->faker->company,
            'isbn' => $this->faker->unique()->isbn13,
            'edition' => $this->faker->randomDigit,
            'year_published' => $this->faker->year,
            'category' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
