<?php

namespace Database\Seeders;

use App\Models\TestimonialVideo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TestimonialVideo::factory(10)->create();
    }
}
