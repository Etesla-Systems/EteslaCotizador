<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APIPaneles;
use App\APIModels\APIInversores;
use App\APIModels\APICliente;
use App\APIModels\APIVendedor;
use App\APIModels\APICotizacion;
use Illuminate\Support\Facades\Storage;

class BajaTensionController extends Controller
{
    protected $paneles;
    protected $inversores;
    protected $vendedor;
    protected $clientes;
    protected $cotizacion;

    public function __construct(APIPaneles $paneles, APIInversores $inversores, APIVendedor $vendedor, APICliente $clientes, APICotizacion $cotizacion)
    {
        $this->paneles = $paneles;
        $this->inversores = $inversores;
        $this->vendedor = $vendedor;
        $this->clientes = $clientes;
        $this->cotizacion = $cotizacion;
    }

    public function index()
    {
        if ($this->validarSesion() == 0) {
            return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
        }

        $dataUsuario["id"] = session('dataUsuario')->idUsuario;
        $consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);
        $consultarClientes = $consultarClientes->message;
        $rol = session('dataUsuario')->rol;

        return view('cotizador.pages.vendedor.bajatension', compact('consultarClientes', 'rol'));
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

    public function askCombination(Request $request)
    {
        $cotizacion["idUsuario"] = session('dataUsuario')->idPersona;
        $cotizacion["idCliente"] = $request->idCliente;
        $cotizacion["origen"] = session('dataUsuario')->oficina;
        $cotizacion["destino"] = $request->direccionCliente;
        $cotizacion["consumos"] = $request->consumos;
        $cotizacion["tipoCotizacion"] = "bajaTension";
        $cotizacion["tarifa"] = $request->tarifa;
        $cotizacion["porcentajeDescuento"] = $request->porcentajeDescuento;
        $cotizacion["porcentajePropuesta"] = $request->porcentajePropuesta;

        $response = $this->cotizacion->busquedaInteligente(['json' => $cotizacion]);
        $response = response()->json($response);

        return $response;
    }

    public function getCotizacionBT(Request $request)
    {
        $arrayCompleto["origen"] = session('dataUsuario')->oficina;
        $arrayCompleto["destino"] = $request->direccionCliente;
        $arrayCompleto["consumos"] = $request->consumos;
        $arrayCompleto["tarifa"] = $request->tarifa;
        $arrayCompleto["porcentajePropuesta"] = $request->porcentajePropuesta;
        $arrayCompleto["porcentajeDescuento"] = $request->porcentajeDescuento;

        $response = $this->cotizacion->sendPeriodsBT(['json' => $arrayCompleto]);
        $response = response()->json($response);

        return $response;
    }

    public function calculaViaticos_BT(Request $request)
    {
        $arrayCompleto["idUsuario"] = session('dataUsuario')->idPersona;
        $arrayCompleto["origen"] = session('dataUsuario')->oficina;
        $arrayCompleto["idCliente"] = $request->idCliente;
        $arrayCompleto["destino"] = $request->direccionCliente;
        $arrayCompleto["arrayBTI"] = $request->arrayBTI;
        $arrayCompleto["consumos"] = $request->consumos;
        $arrayCompleto["tarifa"] = $request->tarifa;
        $arrayCompleto["descuento"] = $request->descuentoPropuesta;
        $arrayCompleto["aumento"] = $request->aumentoPropuesta;
        $arrayCompleto["estructura"] = $request->estructura;
        $arrayCompleto["_agregados"] = $request->agregados;
        $arrayCompleto["tipoCotizacion"] = "bajaTension";
        $arrayCompleto["bInstalacion"] = 1; //1 || true

        $response = $this->cotizacion->calcularViaticosBT(['json' => $arrayCompleto]);
        $response = response()->json($response);

        return $response;
    }
}
