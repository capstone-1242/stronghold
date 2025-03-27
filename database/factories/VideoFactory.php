<?php

namespace Database\Factories;

use App\Models\Author;
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
            'author_id' => Author::factory(),
            'url' => fake()->randomElement(['https://youtu.be/WuyPuH9ojCE?si=Nyk4kRV3xh3xcH91', 'https://youtu.be/lQhpetkwWnM?si=aeq3qdciCkiVCIIC','https://youtu.be/5bNI_NloNa8?si=EJvJOWsivibHFGua', 'https://youtu.be/a2R45LuUB_0?si=Oo8-kJbqfUseOcqP' ]),
            'user_id' => User::factory()
        ];
    }
}
