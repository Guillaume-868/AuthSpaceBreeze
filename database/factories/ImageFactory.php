<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [
            'path' => 'images/planets/' . $this->faker->unique()->word() . '.png',
            'disk' => 'public',
            'role' => $this->faker->randomElement(['cover', 'thumbnail', null]),
        ];
    }


    public function pathCrew()
    {
        return [
            'path' => 'images/crews/' . $this->faker->unique()->word() . '.png',
            'disk' => 'public',
            'role' => $this->faker->randomElement(['cover', 'thumbnail', null]),
        ];
    }
}