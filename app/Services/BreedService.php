<?php

namespace App\Services;

use App\Repositories\BreedRepository;
use App\Models\Breed;

class BreedService
{
    protected $breedRepository;

    public function __construct(BreedRepository $breedRepository)
    {
        $this->breedRepository = $breedRepository;
    }

    public function getAllBreeds()
    {
        return $this->breedRepository->all();
    }

    public function createBreed(array $data)
    {
        return $this->breedRepository->create($data);
    }

    public function getBreedById($id)
    {
        return $this->breedRepository->findById($id);
    }

    public function updateBreed($id, array $data)
    {
        return $this->breedRepository->update($id, $data);
    }

    public function deleteBreed($id)
    {
        $this->breedRepository->delete($id);
    }
}
