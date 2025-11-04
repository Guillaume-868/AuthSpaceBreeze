<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Technology>
 */
class TechnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'starships_en' => 'launcher',
            'starships_fr' => 'Lanceur',
            'description_fr' => 'Un vaisseau spatial',
            'description_en' => 'a starship',
            'subtitle_fr' => 'voyage',
            'subtitle_en' =>'travel',
            'launcher_fr' => 'lanceur 101',
            'launcher_en' => 'launcher 101',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
