<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(2)->create();
        User::factory()->create([
            'first_name' => 'Jennifer',
            'last_name' => 'Abraham',
            'role' => 'admin',
            'email' => "jennifer@stronghold.help",
            'password' => 'password'
        ]);

        $this->call([
            LinkSeeder::class,
            MemorialImageSeeder::class,
            MemorialSeeder::class,
            ResourceSeeder::class,
            TagSeeder::class,
            TestimonialVideoSeeder::class,
            VideoSeeder::class,
        ]);


    }
}
