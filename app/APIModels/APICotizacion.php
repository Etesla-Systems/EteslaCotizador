<?php

namespace App\APIModels;

class APICotizacion extends GuzzleHttpRequest
{
    /*#region Media_Tension*/
    /*#region GDMTH*/
    //1er. Paso - Energia requerida y paneles
    public function sendPeriodsGDMTH($request)
    {
        return $this->post("sendPeriods",$request);
    }
    //[Hoja_excel: POWER]
    public function firstStepPOWER($request)
    {
        return $this->post("firstStepPower",$request);
    }

    //2do. Paso - Inversores requeridos
    public function sendInversorSeleccionado($request)
    {
        return $this->post("sendInversorSelected",$request);
    }

    //3er Paso -
    public function calcularViaticos_Totales($request)
    {
        return $this->post("calcularVT",$request);
    }
    /*#endregion*/
    /*#endregion*/

    /*#region cotizacion_bajaTension*/
    //1st. Step
    public function sendPeriodsBT($request)
    {
        return $this->post("sendPeriodsBT",$request);
    }

    public function calcularViaticosBT($request)
    {
        return $this->post("calcularViaticosBTI",$request);
    }

    //[ Hoja: POWER ]
    public function obtenerPowerBT($request)
    {
        return $this->post("obtenerPowerBT",$request);
    }
    /*#endregion*/
    /*#region Busqueda_Inteligente*/
    public function busquedaInteligente($request)
    {
        return $this->post("busqueda-inteligente",$request);
    }
    /*#endregion*/

    /*#region cotizacion_individual*/
    public function sendSingleQuotation($request)
    {
        return $this->post("cotizacionIndividual",$request);
    }
    /*#endregion*/


    /*#region GENERAR_PDF / GUARDAR PROPUESTA*/
    public function generarPDF($request)
    {
        return $this->post("pdf",$request);
    }
    /*#endregion*/
}
