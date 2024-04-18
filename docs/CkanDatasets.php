<?php

/**
 * @OA\Get(
 *     path="/ckan-datasets",
 *     summary="Obtiene todos los conjuntos de datos",
 *     description="Recupera una lista completa de todos los conjuntos de datos desde CKAN.",
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="count",
 *                 type="integer",
 *                 description="Número total de conjuntos de datos disponibles"
 *             ),
 *             @OA\Property(
 *                 property="datasets",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Dataset"),
 *                 description="Lista completa de conjuntos de datos"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud"
 *     )
 * )
 */


/**
 * @OA\Get(
 *     path="/ckan-datasets/details/{id}",
 *     summary="Obtiene detalles de un conjunto de datos específico",
 *     description="Recupera los detalles completos de un conjunto de datos específico en CKAN, incluyendo recursos y etiquetas, con opciones de paginación para listas extensas.",
 *     tags={"Search"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID único del conjunto de datos",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Número de página para la paginación de los elementos dentro del conjunto de datos, como los recursos asociados",
 *         required=false,
 *         @OA\Schema(
 *             type="integer",
 *             default=1
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="rows",
 *         in="query",
 *         description="Número de elementos a devolver por página dentro del conjunto de datos, como los recursos asociados",
 *         required=false,
 *         @OA\Schema(
 *             type="integer",
 *             default=10
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detalles del conjunto de datos con paginación aplicada a listas internas si es necesario",
 *         @OA\JsonContent(ref="#/components/schemas/DatasetDetail")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Conjunto de datos no encontrado"
 *     )
 * )
 */


/**
 * @OA\Get(
 *     path="/ckan-datasets/resource_details/{id}",
 *     summary="Obtiene detalles de un conjunto de datos específico",
 *     description="Recupera los detalles completos de un conjunto de datos específico en CKAN, incluyendo recursos y etiquetas.",
 *     tags={"Search"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID único del conjunto de datos",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detalles del conjunto de datos",
 *         @OA\JsonContent(ref="#/components/schemas/Resource")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Conjunto de datos no encontrado"
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-datasets/resource_view/{id}",
 *     summary="Obtiene la bista asociada al recurso",
 *     description="Recupera la vista con su id para poder incrustar el iframe",
 *     tags={"Search"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID único del recurso",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detalles de la vista del dato",
 *         @OA\JsonContent(ref="#/components/schemas/Resource")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="vista de dato no encontrada"
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-datasets-by-tag/{tag}",
 *     summary="Obtiene conjuntos de datos por etiqueta",
 *     description="Recupera conjuntos de datos asociados con una etiqueta específica, con opciones de paginación.",
 *     tags={"Search"},
 *     @OA\Parameter(
 *         name="tag",
 *         in="path",
 *         required=true,
 *         description="Etiqueta para filtrar los conjuntos de datos",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="start",
 *         in="query",
 *         required=false,
 *         description="Índice de inicio para la paginación de los conjuntos de datos",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Parameter(
 *         name="rows",
 *         in="query",
 *         required=false,
 *         description="Número de conjuntos de datos a devolver en la respuesta",
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Lista de conjuntos de datos filtrados por etiqueta",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="count",
 *                 type="integer",
 *                 description="Número total de conjuntos de datos encontrados"
 *             ),
 *             @OA\Property(
 *                 property="datasets",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Dataset"),
 *                 description="Conjuntos de datos que coinciden con la etiqueta especificada"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud"
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-datasets/search",
 *     summary="Busca en los conjuntos de datos",
 *     description="Realiza una búsqueda en los conjuntos de datos basándose en un término de búsqueda y devuelve una lista de resultados paginados.",
 *     tags={"Search"},
 *     @OA\Parameter(
 *         name="query",
 *         in="query",
 *         required=false,
 *         description="Término de búsqueda para los conjuntos de datos",
 *         @OA\Schema(type="string", default="")
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         required=false,
 *         description="Índice de inicio para la paginación de los resultados",
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Parameter(
 *         name="size",
 *         in="query",
 *         required=false,
 *         description="Número de resultados a devolver por página",
 *         @OA\Schema(type="integer", default=5)
 *     ),
 *     @OA\Parameter(
 *         name="orderColumnIndex",
 *         in="query",
 *         required=false,
 *         description="Número de resultados a devolver por página",
 *         @OA\Schema(type="string", default="")
 *     ),
 *     @OA\Parameter(
 *         name="orderDir",
 *         in="query",
 *         required=false,
 *         description="Número de resultados a devolver por página",
 *         @OA\Schema(type="string", default="")
 *     ),
 *     @OA\Parameter(
 *         name="group",
 *         in="query",
 *         required=false,
 *         description="Número de resultados a devolver por página",
 *         @OA\Schema(type="string", default="")
 *     ),
 *     @OA\Parameter(
 *         name="groups",
 *         in="query",
 *         required=false,
 *         description="Número de resultados a devolver por página",
 *         @OA\Schema(type="string", default="")
 *     ),
 *     @OA\Parameter(
 *         name="formats",
 *         in="query",
 *         required=false,
 *         description="Número de resultados a devolver por página",
 *         @OA\Schema(type="string", default="")
 *     ),
 *     @OA\Parameter(
 *         name="tags",
 *         in="query",
 *         required=false,
 *         description="Número de resultados a devolver por página",
 *         @OA\Schema(type="string", default="")
 *     ),
 *     @OA\Parameter(
 *         name="organizations",
 *         in="query",
 *         required=false,
 *         description="Número de resultados a devolver por página",
 *         @OA\Schema(type="string", default="")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Resultados de la búsqueda de conjuntos de datos",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="count",
 *                 type="integer",
 *                 description="Número total de resultados de la búsqueda"
 *             ),
 *             @OA\Property(
 *                 property="datasets",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Dataset"),
 *                 description="Conjuntos de datos que coinciden con el término de búsqueda"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud"
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-datasets/tag_list",
 *     summary="Obtener la lista de etiquetas disponibles",
 *     tags={"Tags"},
 *     @OA\Response(
 *         response=200,
 *         description="Éxito al obtener la lista de etiquetas",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="datasets",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Dataset"),
 *                 description="Conjuntos de datos que coinciden con el término de búsqueda"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error al procesar la solicitud",
 *         @OA\Schema(
 *             type="object",
 *             @OA\Property(property="error", type="string", description="Mensaje de error")
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-datasets/group_list",
 *     summary="Obtener la lista de grupos disponibles",
 *     tags={"Group"},
 *     @OA\Response(
 *         response=200,
 *         description="Éxito al obtener la lista de grupos",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="datasets",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Dataset"),
 *                 description="Conjuntos de datos que coinciden con el término de búsqueda"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error al procesar la solicitud",
 *         @OA\Schema(
 *             type="object",
 *             @OA\Property(property="error", type="string", description="Mensaje de error")
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-datasets/formats_about",
 *     summary="Obtener la lista de grupos disponibles",
 *     tags={"Resource"},
 *     @OA\Response(
 *         response=200,
 *         description="Éxito al obtener la lista de grupos",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="datasets",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Dataset"),
 *                 description="Conjuntos de datos que coinciden con el término de búsqueda"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error al procesar la solicitud",
 *         @OA\Schema(
 *             type="object",
 *             @OA\Property(property="error", type="string", description="Mensaje de error")
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-datasets/group_datasets/{name}",
 *     summary="Obtiene detalles de un conjunto de datos específico",
 *     description="Recupera los detalles completos de un conjunto de datos específico en CKAN, incluyendo recursos y etiquetas, con opciones de paginación para listas extensas.",
 *     tags={"Group"},
 *     @OA\Parameter(
 *         name="name",
 *         in="path",
 *         required=true,
 *         description="NAME único del conjunto de datos",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detalles del conjunto de datos con paginación aplicada a listas internas si es necesario",
 *         @OA\JsonContent(ref="#/components/schemas/DatasetDetail")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Conjunto de datos no encontrado"
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-organization-id/{name}",
 *     summary="Obtiene el ID de una organización específica en CKAN",
 *     tags={"CKAN"},
 *     @OA\Parameter(
 *         name="name",
 *         in="path",
 *         required=true,
 *         description="Nombre de la organización en CKAN",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Éxito al obtener el ID de la organización",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="organization_id",
 *                 type="string",
 *                 description="ID de la organización en CKAN"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud o organización no encontrada",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 description="Mensaje de error"
 *             )
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-organization/{id}",
 *     summary="Obtiene detalles de una organización específica en CKAN",
 *     tags={"CKAN"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID de la organización en CKAN",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Información detallada de la organización",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="organization",
 *                 type="object",
 *                 description="Detalles de la organización"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud o organización no encontrada",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 description="Mensaje de error"
 *             )
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-datasets/organization/{name}/{page}/{size}",
 *     summary="Obtiene conjuntos de datos de una organización específica paginados",
 *     description="Recupera una lista de conjuntos de datos de una organización específica en CKAN, con la opción de paginación y búsqueda.",
 *     tags={"CKAN"},
 *     @OA\Parameter(
 *         name="name",
 *         in="path",
 *         required=true,
 *         description="Nombre de la organización en CKAN",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         required=false,
 *         description="Número de página para la paginación (opcional)",
 *         @OA\Schema(type="integer", default=1)
 *     ),
 *     @OA\Parameter(
 *         name="size",
 *         in="query",
 *         required=false,
 *         description="Cantidad de registros por página (opcional)",
 *         @OA\Schema(type="integer", default=5)
 *     ),
 *     @OA\Parameter(
 *         name="search",
 *         in="query",
 *         required=false,
 *         description="Término de búsqueda para filtrar los conjuntos de datos (opcional)",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Conjuntos de datos de la organización paginados y filtrados según el término de búsqueda",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="count",
 *                 type="integer",
 *                 description="Número total de conjuntos de datos disponibles para la organización"
 *             ),
 *             @OA\Property(
 *                 property="datasets",
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Dataset"),
 *                 description="Lista paginada de conjuntos de datos de la organización"
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud"
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/ckan-organization/all",
 *     summary="Obtiene todas las organizaciones",
 *     description="Recupera una lista completa de todas las organizaciones desde CKAN.",
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="success",
 *                 type="boolean",
 *                 description="Indica si la operación fue exitosa"
 *             ),
 *             @OA\Property(
 *                 property="result",
 *                 type="array",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(property="id", type="string", description="ID único de la organización"),
 *                     @OA\Property(property="name", type="string", description="Nombre de la organización"),
 *                     @OA\Property(property="description", type="string", description="Descripción de la organización"),
 *                     @OA\Property(property="created", type="string", format="date-time", description="Fecha de creación de la organización"),
 *                     @OA\Property(property="state", type="string", description="Estado de la organización"),
 *                 )
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Error en la solicitud",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 description="Mensaje de error"
 *             )
 *         )
 *     )
 * )
 */
