<?php

/**
 * @OA\Schema(
 *     schema="Pet",
 *     type="object",
 *     title="Pet",
 *     description="Represents a pet in the system, including details like name, type, and age.",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="Unique identifier for the Pet"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Name of the Pet"
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         description="Type of Pet (e.g., Cat, Dog)"
 *     ),
 *     @OA\Property(
 *         property="age",
 *         type="integer",
 *         format="int32",
 *         description="Age of the Pet in years"
 *     )
 * )
 */
