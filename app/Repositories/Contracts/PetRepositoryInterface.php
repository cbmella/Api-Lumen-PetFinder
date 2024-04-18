<?php

namespace App\Repositories\Contracts;

interface PetRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function findById($id);
    public function update($id, array $data);
    public function delete($id);
    public function search(array $filters);
}