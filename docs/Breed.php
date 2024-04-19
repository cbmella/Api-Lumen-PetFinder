<?php

/**
 * @OA\Schema(
 *     schema="Breed",
 *     type="object",
 *     title="Breed",
 *     description="Represents an animal breed in the system, providing details about the breed characteristics.",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="Unique identifier for the Breed"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the Breed"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Detailed description of the Breed"
 *     )
 * )
 */
