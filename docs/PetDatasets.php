<?php

/**
 * @OA\Get(
 *     path="/api/v1/pets",
 *     summary="List all pets",
 *     description="Retrieve a list of all pets available in the database.",
 *     tags={"Pets"},
 *     @OA\Response(
 *         response=200,
 *         description="A list of pets",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Pet")
 *         )
 *     )
 * )
 */

/**
 * @OA\Post(
 *     path="/api/v1/pets",
 *     summary="Create a new pet",
 *     description="Add a new pet to the database.",
 *     tags={"Pets"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="Pet data including user_id, name, description, location, photo_url, status, and optional fields such as breed_id, age, personality, and adoption requirements.",
 *         @OA\JsonContent(
 *             required={"user_id", "name", "description", "location", "photo_url", "status"},
 *             @OA\Property(property="user_id", type="integer", description="The ID of the user"),
 *             @OA\Property(property="name", type="string", description="Name of the pet", example="cachupin"),
 *             @OA\Property(property="description", type="string", description="Description of the pet", example="affectionate dog"),
 *             @OA\Property(property="location", type="string", description="Current location of the pet", example="Machali"),
 *             @OA\Property(property="photo_url", type="string", format="uri", description="URL of the pet's photo", example="https://example.com/path/to/photo.jpg"),
 *             @OA\Property(property="status", type="string", enum={"lost", "adoption"}, description="Status of the pet"),
 *             @OA\Property(property="breed_id", type="integer", description="ID of the breed, if applicable", example=1, nullable=true),
 *             @OA\Property(property="age", type="integer", description="Age of the pet, if known", example=5, nullable=true),
 *             @OA\Property(property="personality", type="string", description="Personality traits of the pet, if known", example="Friendly, calm", nullable=true),
 *             @OA\Property(property="adoption_requirements", type="string", description="Requirements for adopting the pet, if any", example="Must have a fenced yard", nullable=true)
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Pet created successfully"
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input data",
 *         @OA\JsonContent(
 *             @OA\Property(property="errors", type="object", description="Details of the validation errors")
 *         )
 *     )
 * )
 */



/**
 * @OA\Get(
 *     path="/api/v1/pets/{id}",
 *     summary="Retrieve a specific pet",
 *     description="Retrieve details about a specific pet by ID.",
 *     tags={"Pets"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Pet ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detailed information about a pet",
 *         @OA\JsonContent(ref="#/components/schemas/Pet")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Pet not found"
 *     )
 * )
 */

/**
 * @OA\Put(
 *     path="/api/v1/pets/{id}",
 *     summary="Update a specific pet",
 *     description="Update details for a specific pet by ID.",
 *     tags={"Pets"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Pet ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Pet data to update",
 *         @OA\JsonContent(ref="#/components/schemas/Pet")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Pet updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Pet")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input data"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Pet not found"
 *     )
 * )
 */

/**
 * @OA\Delete(
 *     path="/api/v1/pets/{id}",
 *     summary="Delete a specific pet",
 *     description="Deletes a specific pet by ID.",
 *     tags={"Pets"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Pet ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Pet deleted successfully"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Pet not found"
 *     )
 * )
 */


/**
 * @OA\Get(
 *     path="/api/v1/breeds",
 *     summary="List all breeds",
 *     description="Retrieve a list of all breeds available in the database.",
 *     tags={"Breeds"},
 *     @OA\Response(
 *         response=200,
 *         description="A list of breeds",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Breed")
 *         )
 *     )
 * )
 */

 /**
 * @OA\Get(
 *     path="/api/v1/breeds/{id}",
 *     summary="Retrieve a specific breed",
 *     description="Retrieve details about a specific breed by ID.",
 *     tags={"Breeds"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Breed ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detailed information about a breed",
 *         @OA\JsonContent(ref="#/components/schemas/Breed")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Breed not found"
 *     )
 * )
 */


/**
 * @OA\Post(
 *     path="/api/v1/breeds",
 *     summary="Create a new breed",
 *     description="Add a new breed to the database.",
 *     tags={"Breeds"},
 *     @OA\RequestBody(
 *         required=true,
 *         description="Breed data",
 *         @OA\JsonContent(ref="#/components/schemas/Breed")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Breed created successfully"
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input data"
 *     )
 * )
 */

 /**
 * @OA\Put(
 *     path="/api/v1/breeds/{id}",
 *     summary="Update a specific breed",
 *     description="Update details for a specific breed by ID.",
 *     tags={"Breeds"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Breed ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         description="Breed data to update",
 *         @OA\JsonContent(ref="#/components/schemas/Breed")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Breed updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Breed")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input data"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Breed not found"
 *     )
 * )
 */

 /**
 * @OA\Delete(
 *     path="/api/v1/breeds/{id}",
 *     summary="Delete a specific breed",
 *     description="Deletes a specific breed by ID.",
 *     tags={"Breeds"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Breed ID",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Breed deleted successfully"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Breed not found"
 *     )
 * )
 */
