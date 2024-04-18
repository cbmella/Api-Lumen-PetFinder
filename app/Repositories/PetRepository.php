<?php

namespace App\Repositories;

use App\Models\Pet;
use App\Repositories\Contracts\PetRepositoryInterface;

class PetRepository implements PetRepositoryInterface
{
    public function all()
    {
        return Pet::all();
    }

    public function create(array $data)
    {
        return Pet::create($data);
    }

    public function findById($id)
    {
        return Pet::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $pet = $this->findById($id);
        $pet->update($data);
        return $pet;
    }

    public function delete($id)
    {
        $pet = $this->findById($id);
        $pet->delete();
    }

    public function search(array $filters, $perPage = 10)
    {
        $query = Pet::query();

        if (isset($filters['name'])) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        if (isset($filters['location'])) {
            $query->where('location', 'like', '%' . $filters['location'] . '%');
        }

        //TO-DO gregar filtro foto reconocimiento facial

        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        // if (isset($filters['breed'])) {
        //     $query->where('breed', 'like', '%' . $filters['breed'] . '%');
        // }
        if (isset($filters['breed_id'])) {
            $query->where('breed_id', $filters['breed_id']);
        }

        if (isset($filters['age'])) {
            $query->where('age', $filters['age']);
        }

        if (isset($filters['personality'])) {
            $query->where('personality', 'like', '%' . $filters['personality'] . '%');
        }

        if (isset($filters['adoption_requirements'])) {
            $query->where('adoption_requirements', 'like', '%' . $filters['adoption_requirements'] . '%');
        }

        return $query->paginate($perPage);
    }

    public function getLatest($limit = 10)
    {
        return Pet::latest()->take($limit)->get();
    }

    public function searchGeneral($searchTerm, $perPage = 10)
    {
        return Pet::where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%')
                ->orWhere('location', 'like', '%' . $searchTerm . '%')
                ->orWhere('breed', 'like', '%' . $searchTerm . '%')
                ->orWhere('personality', 'like', '%' . $searchTerm . '%')
                ->orWhere('adoption_requirements', 'like', '%' . $searchTerm . '%');
        })->paginate($perPage);
    }
}
