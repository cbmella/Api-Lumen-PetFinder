<?php

namespace App\Repositories;

use App\Models\Breed;
use App\Repositories\Contracts\BreedRepositoryInterface;

class BreedRepository implements BreedRepositoryInterface
{
    public function all()
    {
        return Breed::all();
    }

    public function create(array $data)
    {
        return Breed::create($data);
    }

    public function findById($id)
    {
        return Breed::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $breed = $this->findById($id);
        $breed->update($data);
        return $breed;
    }

    public function delete($id)
    {
        $breed = $this->findById($id);
        $breed->delete();
    }
}
