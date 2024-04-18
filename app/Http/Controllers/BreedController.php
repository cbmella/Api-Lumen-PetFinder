<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Services\BreedService;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    protected $breedService;

    public function __construct(BreedService $breedService)
    {
        $this->breedService = $breedService;
    }

    public function index()
    {
        $breeds = $this->breedService->getAllBreeds();
        return response()->json($breeds);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $breed = $this->breedService->createBreed($validator->validated());
        return response()->json($breed, 201);
    }

    public function show($id)
    {
        $breed = $this->breedService->getBreedById($id);
        return response()->json($breed);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $breed = $this->breedService->updateBreed($id, $validator->validated());
        return response()->json($breed);
    }

    public function destroy($id)
    {
        $this->breedService->deleteBreed($id);
        return response()->json(null, 204);
    }
}
