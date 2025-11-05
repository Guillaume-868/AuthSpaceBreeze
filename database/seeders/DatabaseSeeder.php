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
        // User::factory(10)->create();

         // Appelle ici tous les seeders que tu veux exécuter
         $this->call([
            PlanetSeeder::class,
            CrewSeeder::class,
            TechnologysSeeder::class

            // Ajoute d'autres seeders ici si nécessaire
            
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
