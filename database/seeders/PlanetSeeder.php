<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Planet;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Planet::factory()->create([
            'name_fr' => 'Lune',
            'name_en' => 'Moon',
            'description_fr' => "Voyez notre planète comme vous ne l'avez jamais vue auparavant. Un parfait voyage de détente pour vous aider à prendre du recul et revenir requinqué. Pendant que vous y êtes, plongez-vous dans l'histoire en visitant les sites d'atterrissage de Luna 2 et Apollo 11.",
            'description_en' => 'See our planet as you have never seen it before. A perfect relaxing journey to help you to  take a step back and come back refreshed. While you are there, dive into the story when visiting the landing site of Luna 2 and Apollo 11.',
            'distance_fr' => '384000 km',
            'distance_en' => '384000 km',
            'duration_fr' => '3 Jours',
            'duration_en' => '3 Days',
            'subtitle_fr' => "choisissez votre destination",
            'subtitle_en' => "choose your destination"
        ]);
    }

 
}
