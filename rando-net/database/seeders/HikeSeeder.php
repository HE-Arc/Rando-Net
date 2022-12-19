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
        //Hike::truncate();
        $hikes = [
            ['name' => 'Marche sur les crêtes de Tête de Ran', 'region' => 'Tête de Ran', 'coordinates' => '555\'844/211\'844', 'difficulty' => 2, 'map' => 'placeholder.png', 'description' => 'sé tré joli', 'validated' => false, 'submittedBy' => 1],
            ['name' => 'Sentier des 5 lacs', 'region' => 'Zermatt', 'coordinates' => '624\'254/096\'817', 'difficulty' => 3, 'map' => 'placeholder.png', 'description' => 'Jolie vue sur le Matterhorn depuis le Stellisee', 'validated' => true, 'submittedBy' => 2],
            ['name' => 'Gastlosen', 'region' => 'Jaun', 'coordinates' => '588\'590/161\'950', 'difficulty' => 4, 'map' => 'placeholder.png', 'description' => 'Vue imprenable depuis le refuge du soldat', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Sentier du temps', 'region' => 'Chaumont', 'coordinates' => '321\'324/219\'834', 'difficulty' => 1, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Gorges de l\'Areuse', 'region' => 'Tête de Ran', 'coordinates' => '621\'421/436\'827', 'difficulty' => 3, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Pointe Dufour', 'region' => 'Alpes', 'coordinates' => '211\'832/312\'744', 'difficulty' => 5, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Sentier des quatorze contours', 'region' => 'Creux du Van', 'coordinates' => '421\'234/442\'123', 'difficulty' => 3, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Tourbière des Ponts de Martel', 'region' => 'Ponts de Martel', 'coordinates' => '412\'962/134\'553', 'difficulty' => 1, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Visite des forts du Mont Vully', 'region' => 'Mont Vully' , 'coordinates' => '214\'214/091\'842', 'difficulty' => 2, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Balade à l\'abbaye de Fontaine-André', 'region' => 'Neuchâtel', 'coordinates' => '555\'844/211\'844', 'difficulty' => 1, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Sentier des vignes à Auvernier', 'region' => 'Auvernier - Milvignes', 'coordinates' => '213\'412/444\'431', 'difficulty' => 1, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Mont Racine par la Grande Sagneule', 'region' => 'Mont Racine', 'coordinates' => '421\'053/642\'532', 'difficulty' => 3, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],
            ['name' => 'Sentier des Statues', 'region' => 'La Sagne', 'coordinates' => '123\'456/789\'101', 'difficulty' => 2, 'map' => 'placeholder.png', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo.', 'validated' => true, 'submittedBy' => 1],

        ];

        foreach ($hikes as $hike) {
            Hike::create([
                'name' => $hike['name'],
                'region' => $hike['region'],
                'coordinates' => $hike['coordinates'],
                'difficulty' => $hike['difficulty'],
                'map' => $hike['map'],
                'description' => $hike['description'],
                'validated' => $hike['validated'],
                'submittedBy' => $hike['submittedBy'],
            ]);
        }
    }
}
