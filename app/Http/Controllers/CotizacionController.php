<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PDFController;
use Illuminate\Http\Request;
use App\APIModels\APICotizacion;

class CotizacionController extends Controller
{
    protected $cotizacion;
    protected $pdfi;

    public function __construct(APICotizacion $cotizacion, PDFController $pdfi)
    {
        $this->cotizacion = $cotizacion;
        $this->pdfi = $pdfi;
    }

    public function generatePDF(Request $request)
    {
        if($request->isMethod('post')){
            return $this->pdfi->generatePDF($request);
        }
    }
}
