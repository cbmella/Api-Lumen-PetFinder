<?php

namespace Database\Factories;

use App\Models\Pet;
use App\Models\Breed;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

class PetFactory extends Factory
{
    protected $model = Pet::class;

    public function definition()
    {
        // Asegúrate de tener al menos algunas razas creadas para que esto funcione correctamente
        $breed = Breed::factory()->create();

        // Obtener una imagen aleatoria para la raza seleccionada
        $response = Http::get("https://dog.ceo/api/breed/" . strtolower($breed->name) . "/images/random");
        $photoUrl = $response->json()['message'];

        return [
            'user_id' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->city,
            'photo_url' => $photoUrl,
            'status' => $this->faker->randomElement(['lost', 'adoption']),
            'breed_id' => $breed->id, // Utilizar el ID de la raza
            'age' => $this->faker->numberBetween(1, 15),
            'personality' => $this->faker->paragraph,
            'adoption_requirements' => $this->faker->paragraph,
        ];
    }
}
