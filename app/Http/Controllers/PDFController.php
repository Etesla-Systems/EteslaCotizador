<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use PDF;
use Throwable;

class PDFController extends Controller
{
    public function generatePDF($propuesta)
    {

        $pdfTemplate = '';

        try{
            $tipoCotizacion = $propuesta["tipoCotizacion"];

            //Nombre del documento PDF
            $fileName = $this->getFileName($propuesta);

            if($tipoCotizacion === "bajaTension"){
                $pdfTemplate = 'PDFTemplates.bajaTension';
            }

            if($tipoCotizacion === "Combinacion"){
                $pdfTemplate = 'PDFTemplates.propuestaCombinaciones';
            }

            if($tipoCotizacion === "individual"){
                $pdfTemplate = 'PDFTemplates.individual';
            }

            Log::info($propuesta);
            Log::info($pdfTemplate);

            //Obtener graficos
            if($tipoCotizacion === "Combinacion" || $tipoCotizacion === "bajaTension"){
                $ConfigChart = $this->getChartsPDF($propuesta);

                //Agregar a la [data] el apartado de -Chart- (graficos)
                $propuesta["Chart"] = $ConfigChart;
            }

            $pdf = PDF::loadview($pdfTemplate, $propuesta)
                ->setOptions(['isRemoteEnabled' => true])
                ->setPaper('A4');

            //Se comprueba *LA EXISTENCIA* del directorio en donde se almacenaran los PDF
            if(!file_exists(storage_path('/pdfsGenerados'))){
                //Si no existe, SE CREA EL DIRECTORIO
                mkdir(storage_path().'/pdfsGenerados');
            }

            $path = storage_path('/pdfsGenerados'); //Ruta de almacenamiento

            $pdf->save($path . '/' . $fileName); ///Se guarda el pdf elaborado en el server (root)

            $pdf = $path . '/' . $fileName; ///Nombre path + Nombre documento.pdf

            return response()->download($pdf);
        }
        catch(Throwable $error){
            report($error);
        }
    }

    public function getFileName($data)
    {
        try{
            if($data["tipoCotizacion"] != "Combinacion"){
                /* La *data.tipioCotizacion* que sea diferente a "CombinacionCotizacion"
                   es un [object:request]. Obtener el arrayData del Object:Request, para
                   que este sea manipulable y no genere un error.
                */
                $data = $data->all();
            }
            else{ ///Combinaciones
                $data = $data["propuesta"];
            }

            /* Nombre del cliente - Estructurado */
            $nombre = is_null($data["cliente"]["vNombrePersona"]) ? ' ' : $data["cliente"]["vNombrePersona"];
            $primerApellido = is_null($data["cliente"]["vPrimerApellido"]) ? ' ' : $data["cliente"]["vPrimerApellido"];
            $segundoApellido = is_null($data["cliente"]["vSegundoApellido"]) ? ' ' : $data["cliente"]["vSegundoApellido"];

            /* Nombre del cliente - Completo */
            $fullName = $nombre . $primerApellido . $segundoApellido;

            $tipoCotizacion = $data["tipoCotizacion"];

            $nombrePropuesta = $fullName . '_' . $tipoCotizacion . '_'  . time() . '.pdf';

            return $nombrePropuesta;
        }
        catch(Throwable $error){
            throw $error;
        }
    }

    public function getChartsPDF($data)
    {
        $chartURI = 'https://quickchart.io/chart?c=';

        try{
            $tipoCotizacion = $data["tipoCotizacion"];

            //Validar -tipoCotizacion-
            if($tipoCotizacion === "Combinacion"){
                $data = $data["propuesta"];
            }

            /* [DATA] */
            ///Energetica
            $consumoActualBim = $data["power"]["_consumos"]["_promCons"]["_consumosBimestrales"];
            $generacionBim = $data["power"]["generacion"]["_generacionBimestral"];
            $consumoNuevoBim = $data["power"]["nuevosConsumos"]["_consumosNuevosBimestrales"];

            ///Economica
            $consumosEconActualesBim = $data["power"]["objConsumoEnPesos"]["_pagosBimestrales"];
            $consumosEconNuevosBim = $data["power"]["objGeneracionEnpesos"]["_pagosBimestrales"];

            /* #region ChartEnergetico */
            ///[CONFIG]
            $confChrtEnergetico = [
                "type" => 'bar',
                "data" => [
                    "labels" => ['1er', '2do', '3ro', '4to', '5to', '6to'],
                    "datasets" => [
                        [
                            "label" => "Consumo s/paneles [Bimestral]",
                            "data" => $consumoActualBim,
                            "backgroundColor" => 'rgba(245, 62, 29, 0.61)',
                            "borderColor" => 'rgba(245, 62, 29, 1)',
                            "borderWidth" => 1
                        ],
                        [
                            "label" => "Generacion [Bimestral]",
                            "data" => $generacionBim,
                            "backgroundColor" => 'rgba(102, 196, 79, 0.54)',
                            "borderColor" => 'rgba(85, 177, 62, 1)',
                            "borderWidth" => 1
                        ],
                        [
                            "label" => "Nuevo consumo c/paneles [Bimestral]",
                            "data" => $consumoNuevoBim,
                            "backgroundColor" => 'rgba(29, 170, 245, 0.55)',
                            "borderColor" => 'rgba(29, 170, 245, 1)',
                            "borderWidth" => 1
                        ]
                    ]
                ],
                "options" => [
                    "responsive" => true,
                    "maintainAspectRatio" => true,
                    "title" => [
                        "display" => true,
                        "position" => "top",
                        "text" => "Consumo electrico"
                    ]
                ]
            ];

            $confChrtEnergetico = json_encode($confChrtEnergetico);

            ///[URI]
            $chartURIEnerg = $chartURI . urlencode($confChrtEnergetico);

            ///[GET_FILE_CONTENTS]
            $confChrtEnergetico = file_get_contents($chartURIEnerg);

            //Grafico_Energetico
            $chartEnergetico = 'data:image/png;base64,'. base64_encode($confChrtEnergetico);
            /* #endregion */

            /* #region ChartEconomico */
            ///[CONFIG]
            $confChrtEconomico = [
                "type" => 'bar',
                "data" => [
                    "labels" => ['1er', '2do', '3ro', '4to', '5to', '6to'],
                    "datasets" => [
                        [
                            "label" => "Consumo s/paneles [Bimestral]",
                            "data" => $consumosEconActualesBim,
                            "backgroundColor" => 'rgba(245, 62, 29, 0.61)',
                            "borderColor" => 'rgba(245, 62, 29, 1)',
                            "borderWidth" => 1
                        ],
                        [
                            "label" => "Consumo c/paneles [Bimestral]",
                            "data" => $consumosEconNuevosBim,
                            "backgroundColor" => 'rgba(102, 196, 79, 0.54)',
                            "borderColor" => 'rgba(85, 177, 62, 1)',
                            "borderWidth" => 1
                        ]
                    ]
                ],
                "options" => [
                    "responsive" => true,
                    "maintainAspectRatio" => true,
                    "title" => [
                        "display" => true,
                        "position" => "top",
                        "text" => "Consumo economico"
                    ]
                ]
            ];

            $confChrtEconomico = json_encode($confChrtEconomico);

            ///[URI]
            $chartURIEcon = $chartURI . urlencode($confChrtEconomico);

            ///[GET_FILE_CONTENTS]
            $confChrtEconomico = file_get_contents($chartURIEcon);

            //Grafico_Economico
            $chartEconomico = 'data:image/png;base64,' . base64_encode($confChrtEconomico);
            /* #endregion */

            $charts = [
                "chartEnergetico" => $chartEnergetico,
                "chartEconomico" => $chartEconomico
            ];

            return $charts;

        }
        catch(Throwable $error){
            throw $error;
        }
    }

    public function visualizarPDF()
    {
        $pdf = PDF::loadview('PDFTemplates.machotes.hospital')
            ->setOptions(['isRemoteEnabled' => false])
            ->setPaper('A4');

        return $pdf->stream('test.pdf');
    }
}
