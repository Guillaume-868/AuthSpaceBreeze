<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Planet;
use App\Models\Image;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        // Récupère tous les fichiers présents dans storage/app/public/images/planets
        // $files = Storage::disk('public')->files('images/planets');

        // $planets_img = [

        //     "images/planets/moon.png",
        //     "images/planets/mars.png",
        //     "images/planets/europe.png",
        //     "images/planets/titan.png",
        // ];

        // foreach ($planets_img as $planet_img) {
        //     // Crée un enregistrement Image pour chaque fichier
        //     $image = Image::create([
        //         'path' => $planet_img, // chemin relatif : images/planets/nom_image.png
        //         'disk' => 'public',
        //         'role' => null, // ou 'cover', 'thumbnail', selon la logique
        //     ]);
        // }




        $data = [
            [
                'name_fr' => 'Lune',
                'name_en' => 'Moon',
                'description_fr' => "Voyez notre planète comme vous ne l'avez jamais vue auparavant. Un parfait voyage de détente pour vous aider à prendre du recul et revenir requinqué. Pendant que vous y êtes, plongez-vous dans l'histoire en visitant les sites d'atterrissage de Luna 2 et Apollo 11.",
                'description_en' => 'See our planet as you have never seen it before. A perfect relaxing journey to help you to  take a step back and come back refreshed. While you are there, dive into the story when visiting the landing site of Luna 2 and Apollo 11.',
                'distance_fr' => '384000 km',
                'distance_en' => '384000 km',
                'duration_fr' => '3 Jours',
                'duration_en' => '3 Days',
                'image' => 'moon.png',
                
            ],
            [
                'name_fr' => 'Mars',
                'name_en' => 'Mars',
                'description_fr' => "N'oubliez pas vos bottes de randonnée. Vous en aurez besoin pour gravir le mont Olympus, la plus haute montagne planétaire dans notre système solaire. Il fait deux fois et demie la taille de l'Everest !",
                'description_en' => 'Don’t forget your  hiking boots. You will need them for climbing Mount Olympus, the highest planetary mountain in our solar system. It is two and a half times the size of Mount Everest.',
                'distance_fr' => '225 GM',
                'distance_en' => '225 GM',
                'duration_fr' => '9 Mois',
                'duration_en' => '9 Months',
                'image' => 'mars.png',
            ],

            [
                'name_fr' => 'Europe',
                'name_en' => 'Europe',
                'description_fr' => "La plus petite des quatre lunes galiléennes en orbite autour de Jupiter, Europe est le rêve des amoureux de  l'hiver. Sa surface glacée est parfaite pour faire un peu de patin à glace, du curling, du hockey ou tout simplement pour vous détentre dans votre confortable chalet hivernal.",
                'description_en' => 'The smallest of the four Galilean moons in orbit around Jupiter, Europa is the dream of winter lovers. Her frozen surface is perfect for ice skating, curling, hockey, or just simply to relax in a comfortable winter chalet. ',
                'distance_fr' => '628 GM',
                'distance_en' => '628 GM',
                'duration_fr' => '3 Ans',
                'duration_en' => '3 Years',
                'image' => 'europe.png',
            ],
            [
                'name_fr' => 'Titan',
                'name_en' => 'Titan',
                'description_fr' => "La seule lune connue pour avoir une atmosphère dense autre que la Terre, Titan est comme une maison loin de la maison (et juste quelques centaines de degrés plus froid !). En bonus, vous pouvez contemplez des vues saisissantes des anneaux de Saturne.",
                'description_en' => 'The only moon known to have a dense atmosphere other than Earth, Titan is like a home from home (and just a few hundred degrees colder!) As a bonus / Also, you can contemplate the striking / amazing views of Saturn’s rings / the rings of Saturn.',
                'distance_fr' => '1,6 TM',
                'distance_en' => '1,6 TM',
                'duration_fr' => '7 Ans',
                'duration_en' => '7 Years',
                'image' => 'titan.png',
            ]

        ];

        foreach ($data as $item) {
            // dd($data);
            $planet = Planet::create([
                'name_fr' => $item['name_fr'],
                'name_en' => $item['name_en'],
                'description_fr' => $item['description_fr'],
                'description_en' => $item['description_en'],
                'distance_fr' => $item['distance_fr'],
                'distance_en' => $item['distance_en'],
                'duration_fr' => $item['duration_fr'],
                'duration_en' => $item['duration_en'],
                // 'image_id' => null, // on ignore pour l'instant
            ]);
            dump($planet);

            Image::create([
                'path' => 'image/planets/' . $item['image'], // chemin relatif : images/planets/nom_image.png
                'disk' => 'public',
                'role' => null, // ou 'cover', 'thumbnail', selon la logique
                'planet_id'=> $planet->id,

            ]);
        }
    }

    

}
