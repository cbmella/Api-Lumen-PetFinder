<?php

/**
 *  * @OA\Schema(
 *     schema="DatasetDetail",
 *     type="object",
 *     title="Detalle del Conjunto de Datos",
 *     description="Detalles de un conjunto de datos específico en CKAN",
 *     @OA\Property(
 *         property="id",
 *         type="string",
 *         description="ID único del conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Nombre técnico del conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="Título del conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="notes",
 *         type="string",
 *         description="Descripción o notas sobre el conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="url",
 *         type="string",
 *         description="URL del conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="num_resources",
 *         type="integer",
 *         description="Número de recursos disponibles en el conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="metadata_created",
 *         type="string",
 *         format="date-time",
 *         description="Fecha y hora de creación del metadato"
 *     ),
 *     @OA\Property(
 *         property="metadata_modified",
 *         type="string",
 *         format="date-time",
 *         description="Fecha y hora de la última modificación del metadato"
 *     ),
 *     @OA\Property(
 *         property="resources",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Resource"),
 *         description="Recursos asociados al conjunto de datos"
 *     ),
 *     @OA\Property(
 *         property="tags",
 *         type="array",
 *         @OA\Items(ref="#/components/schemas/Tag"),
 *         description="Etiquetas asociadas al conjunto de datos"
 *     )
 * )
 */
