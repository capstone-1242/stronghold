<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

            $tags = $this->fake()->randomElement([
                'responder' => ['firefighter', 'police', 'military', 'paramedic', 'dispatcher'],
                'mental_health' => ['Canadian Hotlines', 'Mental Health Support Websites']]
            );

            return [
                'name' => $tags
            ];
    }
}
