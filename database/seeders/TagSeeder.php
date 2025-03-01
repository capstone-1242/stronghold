<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $tags = [
        ['name' => 'Military'],
        ['name' => 'Paramedics'],
        ['name' => 'Police'],
        ['name' => 'Firefighter'],
        ['name' => '911 Dispatcher'], 
       ];

        foreach($tags as $tag_data){
            Tag::firstOrCreate(['name' => $tag_data['name']]);
        }
    }
}
