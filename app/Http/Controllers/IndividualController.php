<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\APIModels\APIPaneles;
use App\APIModels\APIEstructuras;
use App\APIModels\APIInversores;
use App\APIModels\APICotizacion;
use App\APIModels\APICliente;
use App\APIModels\APIVendedor;

class IndividualController extends Controller
{
    protected $paneles;
    protected $inversores;
    protected $estructuras;
    protected $clientes;
    protected $vendedor;
    protected $cotizacion;

    public function __construct(APIPaneles $paneles, APIEstructuras $estructuras, APIInversores $inversores, APIVendedor $vendedor, APICliente $clientes , APICotizacion $cotizacion)
    {
        $this->paneles = $paneles;
        $this->inversores = $inversores;
        $this->estructuras = $estructuras;
        $this->vendedor = $vendedor;
        $this->clientes = $clientes;
        $this->cotizacion = $cotizacion;
    }

    public function index()
    {
        if ($this->validarSesion() == 0) {
            return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
        }

        $vPaneles = $this->paneles->view();
        $vInversores = $this->inversores->view();
        $vEstructuras = $this->estructuras->view();
        $vEstructuras = $vEstructuras->message;

        return view('cotizador.pages.vendedor.individual',['vPaneles' => $vPaneles, 'vEstructuras' => $vEstructuras,'vInversores' => $vInversores]);
    }

    public function validarSesion()
    {
        if (session()->has('dataUsuario')) {
            $rol = session('dataUsuario')->rol;

            if ($rol == 5|| $rol == 1 || $rol == 0) {
                return 2;
            }
            return 1;
        }
        return 0;
    }

    public function sendSingleQuotation(Request $request){
        $cotizacionIndividual["idUsuario"] = session('dataUsuario')->idPersona;
        $cotizacionIndividual["origen"] = session('dataUsuario')->oficina;
        $cotizacionIndividual["cotizacionIndividual"] = $request->dataCotInd;
        $cotizacionIndividual["tipoCotizacion"] = 'individual';

        $response = $this->cotizacion->sendSingleQuotation(['json' => $cotizacionIndividual]);
        $response = response()->json($response);

        return $response;
    }
}
