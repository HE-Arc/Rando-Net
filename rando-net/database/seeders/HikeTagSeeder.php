<?php

namespace Database\Seeders;

use App\Models\Hike;
use GuzzleHttp\Psr7\AppendStream;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class HikeTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pairs = [
            ['tag_id' => 1],
            ['tag_id' => 2],
            ['tag_id' => 3],
        ];

        Hike::all()->each(function ($hike) use ($pairs)
        {
            $hike->tags()->attach($pairs);
        });

    }
}
