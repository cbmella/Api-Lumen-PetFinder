<?php

namespace Database\Factories;

use App\Models\Breed;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreedFactory extends Factory
{
    protected $model = Breed::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Labrador', 'Poodle', 'Bulldog', 'Beagle', 'Pug', 'Husky', 'Chihuahua', 'Dalmatian', 'Boxer', 'Pitbull'
            ]),
            'description' => $this->faker->paragraph
        ];
    }
}
