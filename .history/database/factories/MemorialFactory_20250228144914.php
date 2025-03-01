<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Memorial>
 */
class MemorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'biography' => fake()->paragraph(3, true),
            'birth_year' => fake()->year('1970-1990'),
            'death_year' => fake()->year('2010-2025'),
            'user_id' => User::factory(),
            'tag_id' => Tag::factory(),
        ];
    }
}
