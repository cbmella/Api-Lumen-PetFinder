<?php

namespace App\Jobs;

use ZipArchive;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Traits\TraitDescargaDeRecursos;
use Exception;
use Illuminate\Bus\Batchable;
use PhpParser\Node\Stmt\Catch_;

class ObtenerRecursoCkan extends Job
{
    use TraitDescargaDeRecursos , Batchable;

    protected $urlsRecursos;
    protected $dirTemp;
    protected $nameZip;

    public function __construct(array $urlsRecursos = array(), string $dirTemp = "" , string $nameZip = "")
    {
        $this->urlsRecursos = $urlsRecursos;
        $this->dirTemp = $dirTemp;
        $this->nameZip = $nameZip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $zip = new ZipArchive;

            $archivoZip = storage_path('app/' . $this->dirTemp . '/'.$this->nameZip.'.zip');
            
            $flag = (file_exists($archivoZip)) ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE;
    
            $openZip = $zip->open($archivoZip, $flag);

            if ( $openZip === TRUE ) {            
                foreach ($this->urlsRecursos as $recurso) {
                    $response = Http::withoutVerifying()->get($recurso["url"]);
    
                    if ($response->successful()) {
                        try {
                            //Prevenir que el proceso falle, para que comprima los archivos que se pudieron descargar
                            $zip->addFromString(basename($recurso["url"]), $response->body());
                        }catch(Exception $e){
                            Log::error($e->getMessage());
                        }
                    } else {
                        Log::error("Error al descargar el recurso: ".$recurso["url"]);
                    }
                }
    
                $zip->close();
    
                Log::info("ZIP creado en la ruta: ".$archivoZip);
            } else {
                Log::error("No se pudo abrir el archivo ZIP para escritura: " . $archivoZip);
            }
        }catch(Exception $e){
            Log::error($e->getMessage());
        }
    }
}
