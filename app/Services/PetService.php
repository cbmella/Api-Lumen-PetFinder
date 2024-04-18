<?php

namespace App\Services;

use App\Repositories\PetRepository;
use Symfony\Component\Finder\Finder;

class PetService
{
    protected $petRepository;

    public function __construct(PetRepository $petRepository)
    {
        $this->petRepository = $petRepository;
    }

    public function getAllPets()
    {
        return $this->petRepository->all();
    }

    public function createPet(array $data)
    {
        return $this->petRepository->create($data);
    }

    public function getPetById($id)
    {
        return $this->petRepository->findById($id);
    }

    public function updatePet($id, array $data)
    {
        return $this->petRepository->update($id, $data);
    }

    public function deletePet($id)
    {
        $this->petRepository->delete($id);
    }

    public function searchPets(array $filters, $perPage = 10)
    {
        return $this->petRepository->search($filters, $perPage);
    }

    public function getLatestPets($limit = 10)
    {
        return $this->petRepository->getLatest($limit);
    }

    public function searchGeneralPets($searchTerm, $perPage = 10)
    {
        return $this->petRepository->searchGeneral($searchTerm, $perPage);
    }
}
