<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CrewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fonction_fr' =>'Pilote',
            'fonction_en' => 'Pilot',
            'description_fr' => 'Nous allons décoller',
            'description_en' => 'we\'re gonna take off',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
