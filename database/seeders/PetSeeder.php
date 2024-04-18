<?php

namespace Database\Seeders;

use App\Models\Pet;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    public function run()
    {
        Pet::truncate();
        Pet::factory()->count(10)->create();
    }
}