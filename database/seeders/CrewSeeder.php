<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Crew;
use App\Models\Image;

class CrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Récupère tous les fichiers présents dans storage/app/public/images/crew
        // $files = Storage::disk('public')->files('images/crews');

        // foreach ($files as $file) {
        //     // Crée un enregistrement Image pour chaque fichier
        //     $image = Image::create([
        //         'path' => $file, // chemin relatif : images/planets/nom_image.png
        //         'disk' => 'public',
        //         'role' => null, // ou 'cover', 'thumbnail', selon la logique
        //     ]);

            Crew::factory()->create([
                'fonction_fr' => 'Commandant',
                'fonction_en' => 'Leader',
                'description_fr' => 'Douglas Gerald Hurley est un ingénieur américain, un ancien pilote du Corps des Marines et un ancien astronaute de la NASA. Il s\'est lanc\u00e9 dans l\'espace pour la troisième fois en tant que commandant du vaissaux Crew Dragon Demo-2.',
                'description_en' => 'Douglas Gerald Hurley is an American engineer, an older pilot (flyer) in the Navy corps and an old astronaut of NASA astronaut. He is launched into space for the third time as commander of the Crew Dragon Demo 2.',
            ]);
        }
    }
