<?php

namespace Database\Seeders;

use App\Models\MemorialImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemorialImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemorialImage::factory(10)->create();
    }
}
