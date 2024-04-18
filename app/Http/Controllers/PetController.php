<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Services\PetService;
use Illuminate\Http\Request;

class PetController extends Controller
{
    protected $petService;
    protected $perPage = 6;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    public function index(Request $request)
    {
        $pets = $this->petService->getAllPets();
        return response()->json($pets);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'photo_url' => 'required|url',
            'status' => 'required|in:lost,adoption',
            'breed_id' => 'nullable|integer|exists:breeds,id',
            'age' => 'nullable|integer',
            'personality' => 'nullable|string',
            'adoption_requirements' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        $pet = $this->petService->createPet($data);

        return response()->json($pet, 201);
    }

    public function show($id)
    {
        $pet = $this->petService->getPetById($id);
        return response()->json($pet);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'photo_url' => 'required|url',
            'status' => 'required|in:lost,adoption',
            'breed_id' => 'nullable|integer|exists:breeds,id',
            'age' => 'nullable|integer',
            'personality' => 'nullable|string',
            'adoption_requirements' => 'nullable|string',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $validator->validated();

        $pet = $this->petService->updatePet($id, $data);

        return response()->json($pet);
    }

    public function destroy($id)
    {
        $this->petService->deletePet($id);
        return response()->json(null, 204);
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'location' => 'nullable|string',
            'status' => 'nullable|in:lost,adoption',
            'breed_id' => 'nullable|integer|exists:breeds,id',
            'age' => 'nullable|integer',
            'personality' => 'nullable|string',
            'adoption_requirements' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $filters = $validator->validated();
        $pets = $this->petService->searchPets($filters, $this->perPage);
        return response()->json($pets);
    }

    public function getLatestPets()
    {
        $pets = $this->petService->getLatestPets();
        return response()->json($pets);
    }

    public function searchGeneral(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $searchTerm = $request->input('search');
        $pets = $this->petService->searchGeneralPets($searchTerm, $this->perPage);

        return response()->json($pets);
    }
}
