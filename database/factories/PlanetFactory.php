<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Planet>
 */
class PlanetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_fr' => $this->faker->lexify('???????'),
            'name_en' => $this->faker->lexify('???????'),
            'description_fr' => "Voyez notre planète comme vous ne l'avez jamais vue auparavant. Un parfait voyage de détente pour vous aider à prendre du recul et revenir requinqué. Pendant que vous y êtes, plongez-vous dans l'histoire en visitant les sites d'atterrissage de Luna 2 et Apollo 11.",
            'description_en' => 'This is a fixed English text.',
            'distance_en' => '1500 km',
            'distance_fr' => '2500 km',
            'duration_fr' => '4 Jours',
            'duration_en' => '7 Days',
            'subtitle_fr' => 'Notre système solaire',
            'subtitle_en' => 'our solar system',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
