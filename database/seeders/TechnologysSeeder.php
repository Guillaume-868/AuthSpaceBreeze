<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Technology::factory()->create([
            'starships_fr' =>'Le lanceur',
            'starships_en' => 'The Launcher',
            'description_fr' => 'Un lanceur ou une fusée porteuse est un véhicule propulsé par fusée utilisé pour transporter une charge utile de la surface de la Terre vers l’espace, habituellement vers l’orbite terrestre ou au-delà. Notre fusée WEB-X est la plus puissante en service. Debout à 150 mètres de hauteur, elle donne lieu à un impressionnant spectacle sur le pas de tir !',
            'description_en' => 'A launcher or a booster rocket is a vehicle propulsed by a rocket used for transporting a useful load from the surface of the Planet Earth to Space, often to Earth’s orbit or beyond. Our rocket WEB-X is the most power in service. Standing at one hundred (and) fifty meters high, she gives an impressive show on the launch pad. ',
            'subtitle_fr' => 'la terminologie',
            'subtitle_en' => 'the terminology',
            'launcher_fr' => 'lanceur spatial',
            'launcher_en' => 'space launcher',
        ]);
    }
}
