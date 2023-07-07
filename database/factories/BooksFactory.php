<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(rand(10, 15), true),
            'author' => fake()->name(),
            'publisher' => fake()->word(rand(5, 8), true),
            'year' => fake()->year('+10 years'),
            'category' => $this->faker->randomElement(['Slice Of Life', 'History', 'Science', 'Romance', 'Trilogy', 'Mystery', 'Comedy', 'Comics']),
            'sinopsis' => fake()->sentence(),

        ];
    }
}
