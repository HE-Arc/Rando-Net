<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['name' => 'Mountain'],
            ['name' => 'Lake'],
            ['name' => 'Forest'],
            ['name' => 'Flat'],
            ['name' => 'Parking'],
            ['name' => 'Panoramic view'],
            ['name' => 'River'],
        ];

        foreach($tags as $tag)
        {
            Tag::create(
                [
                    'name' => $tag['name']
                ]
                );
        }
    }
}
