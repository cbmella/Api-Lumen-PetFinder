<?php

namespace App\Console\Commands;

use App\Services\CkanService;
use App\Models\DatasetFormato;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CommandFetchFormatsResources extends Command
{
    public $formatos = array(
        "PDF",
        "CSV",
        "ODS",
        "Rdata",
        "ZIP",
        "XLSX",
    );

    public function inst_service_ckan()
    {
        return (new CkanService);
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch_formats_resources';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Obtener los formatos de los recursos del ckan y posteriormente almacenarlos en la B.D.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $msg = "comando artisan fetch_formats_resources, ejecutado a las: ".date("Y-m-d h:i:s");

        try{
            foreach($this->formatos as $formato){
                $checkFormat = DatasetFormato::where("formato" , $formato)->get();
                $checkFormat = $checkFormat->first();
    
                if( is_null($checkFormat) ){
                    $checkFormat = new DatasetFormato();
                    $checkFormat->formato = $formato;
                    $checkFormat->save();
                }
    
                $c_f = $this->inst_service_ckan()->fetchFormatsResources($formato);
    
                if( $c_f["formato"] ){
                    $checkFormat->activo = 1;
                }else{
                    $checkFormat->activo = 0;
                }
    
                $checkFormat->save();
            }

            Log::info( $msg );
        }catch(Exception $e){
            Log::error($e->getMessage());
        }

        $this->info( $msg );
    }
}