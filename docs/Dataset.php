<?php

/**
 * @OA\Schema(
 *     schema="Dataset",
 *     type="object",
 *     title="Conjunto de Datos",
 *     description="Representa un conjunto de datos en CKAN",
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         description="ID único del conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Nombre del conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="notes",
 *         type="string",
 *         description="Descripción o notas sobre el conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="resource_formats",
 *         type="array",
 *         @OA\Items(type="string"),
 *         description="Formatos de los recursos disponibles para el conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="api_detail_url",
 *         type="string",
 *         description="URL de la API para obtener detalles del conjunto de datos"
 *     )
 * )
 */
