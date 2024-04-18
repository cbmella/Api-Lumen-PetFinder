<?php

namespace Tests;

use Laravel\Lumen\Testing\TestCase;
use App\Http\Controllers\CkanApiController;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Mockery;

class CkanApiControllerTest extends TestCase
{
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        putenv('APP_ENV=testing');
        return require __DIR__.'/../bootstrap/app.php';
    }

    public function testFetchDatasetIds()
    {
        // Crear un mock del cliente Guzzle
        $clientMock = Mockery::mock(Client::class);
        $clientMock->shouldReceive('request')
                   ->once()
                   ->andReturn(new Response(200, [], json_encode([
                       'success' => true, 
                       'result' => [
                           'count' => 1, 
                           'results' => [
                               [
                                   'id' => '020b0085-bc3c-4498-b38b-e161c4795eef',
                                   'name' => 'registro_social_hogares',
                                   'notes' => 'El Registro Social de Hogares es una de las bases de datos...',
                                   'resources' => [
                                       ['format' => 'CSV'],
                                       // Puedes agregar más recursos si es necesario
                                   ],
                                   'api_detail_url' => 'http://localhost/ckan-dataset/020b0085-bc3c-4498-b38b-e161c4795eef'
                               ]
                           ]
                       ]
                   ])));
    
        // Crear una instancia del controlador e inyectar el mock
        $controller = new CkanApiController();
        $controller->client = $clientMock;
    
        // Llamar al método y hacer aserciones
        $response = $controller->fetchDataset();
    
        // Aserciones para la estructura general y conteo
        $this->assertEquals(1, $response['count']);
        $this->assertIsArray($response['datasets']);
        $this->assertCount(1, $response['datasets']);
    
        // Aserciones para los detalles del dataset
        $dataset = $response['datasets'][0];
        $this->assertEquals('020b0085-bc3c-4498-b38b-e161c4795eef', $dataset['id']);
        $this->assertEquals('registro_social_hogares', $dataset['name']);
        $this->assertEquals('El Registro Social de Hogares es una de las bases de datos...', $dataset['notes']);
        $this->assertEquals(['CSV'], $dataset['resource_formats']);  // Verificar el formato de recursos
        $this->assertEquals('http://localhost/ckan-datasets/details/020b0085-bc3c-4498-b38b-e161c4795eef', $dataset['api_detail_url']);
        
    }
        
}
