<?php

use Illuminate\Support\Facades\DB;

$router->get('/', function () use ($router) {
    try {
        $router->app->version();
        $pdo = DB::connection()->getPdo();

        if ($pdo) {
            return 'Conexión a la base de datos exitosa' . ' y versión de lumen: ' . $router->app->version();
        } else {
            return 'No se pudo establecer la conexión a la base de datos';
        }
    } catch (\Exception $e) {
        return 'Error de conexión a la base de datos: ' . $e->getMessage() . ' y versión de lumen: ' . $router->app->version();
    }
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('/', function () {
        return response()->json(['message' => 'Pet API', 'status' => 'Connected']);
    });
    $router->get('pets', 'PetController@index');
    $router->post('pets', 'PetController@store');
    $router->get('pets/latest', 'PetController@getLatestPets');
    $router->get('pets/search', 'PetController@search'); // Ruta específica primero
    $router->get('/pets/search-general', 'PetController@searchGeneral');
    $router->get('pets/{id}', 'PetController@show'); // Ruta variable después
    $router->put('pets/{id}', 'PetController@update');
    $router->delete('pets/{id}', 'PetController@destroy');
    // Rutas para BreedController
    $router->get('breeds', 'BreedController@index');
    $router->post('breeds', 'BreedController@store');
    $router->get('breeds/{id}', 'BreedController@show');
    $router->put('breeds/{id}', 'BreedController@update');
    $router->delete('breeds/{id}', 'BreedController@destroy');
});
