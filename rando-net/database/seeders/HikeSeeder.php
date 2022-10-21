<?php

namespace Database\Seeders;

use App\Models\Hike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hike::truncate();
        $hikes = [
            ['name' => 'Marche sur les crêtes de Tête de Ran', 'region' => 'Tête de Ran', 'coordinates' => '555\'844/211\'844', 'difficulty' => 2, 'map' => 'todo', 'description' => 'sé tré joli', 'validated' => false],
            ['name' => 'Sentier des 5 lacs', 'region' => 'Zermatt', 'coordinates' => '624\'254/096\'817', 'difficulty' => 3, 'map' => 'todo', 'description' => 'Jolie vue sur le Matterhorn depuis le Stellisee', 'validated' => true]
        ];

        foreach($hikes as $hike)
        {
            Hike::create([
                'name' => $hike['name'],
                'region' => $hike['region'],
                'coordinates' => $hike['coordinates'],
                'difficulty' => $hike['difficulty'],
                'map' => $hike['map'],
                'description' => $hike['description'],
                'validated' => $hike['validated']
            ]);
        };
    }

}
