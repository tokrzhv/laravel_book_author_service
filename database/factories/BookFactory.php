<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
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
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text($maxNbChars = 50),
            'author_id' => Author::get()->random()->id,
//            'main_image' => $this->faker->imageUrl(),
        ];
    }
}
