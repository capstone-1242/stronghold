<?php

namespace Database\Factories;

use App\Models\Memorial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\memorialImage>
 */
class MemorialImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'filename' => fake()->imageUrl(400, 400, 'people', true),
            'description' => fake()->text(100),
            'memorial_id' => Memorial::factory(),
        ];
    }
}
