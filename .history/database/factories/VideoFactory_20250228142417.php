<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
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
            'title' => fake()->title(),
            'description' => fake()->text(),
            'author' => fake()->name(),
            'author_description' => fake()->text(),
            'url' => 'https://youtu.be/WuyPuH9ojCE?si=Nyk4kRV3xh3xcH91',
            'user_id' => User::factory()
        ];
    }
}
