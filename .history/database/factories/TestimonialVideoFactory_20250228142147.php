<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\testimonialVideo>
 */
class TestimonialVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => 'https://youtu.be/2EPnNOlxF8M?si=FchevgTWeQ6ONvRU',
            'user_id' => User::factory(),
            'tag_id' => Tag::factory()
        ];
    }
}
