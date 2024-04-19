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
 *         description="Pet data",
 *         @OA\JsonContent(ref="#/components/schemas/Pet")
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Pet created successfully"
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input data"
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
