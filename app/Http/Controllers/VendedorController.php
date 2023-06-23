<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APIVendedor;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PropuestasController;

class VendedorController extends Controller
{
    protected $vendedor;
    protected $clienteController;
    protected $propuestaController;

    public function __construct(APIVendedor $vendedor, ClienteController $clienteController, PropuestasController $propuestasController)
    {
        $this->vendedor = $vendedor;
        $this->clienteController = $clienteController;
        $this->propuestaController = $propuestasController;
    }

    public function index()
    {
        if ($this->validarSesion() == 0) {
            return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
        }
        if ($this->validarSesion() == 1) {
            return redirect('/')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
        }

        $precioDolar = $this->vendedor->precioDelDolar();
        $precioDolar = json_decode($precioDolar->message);

        return view('cotizador.layout.dashboard')->with('precioDolar', $precioDolar);
    }

    public function clientes()
    {
        if ($this->validarSesion() == 0) {
            return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
        }
        if ($this->validarSesion() == 1) {
            return redirect('/')->with('status-fail', 'Solo los vendedores pueden acceder a esta vista.');
        }

        $dataUsuario["id"] = session('dataUsuario')->idUsuario;
        $consultarClientes = $this->vendedor->listarPorUsuario(['json' => $dataUsuario]);

        if($consultarClientes->status == 500){
            return redirect('dashboard')->with('status-fail', 'Error al consultar clientes: '.$consultarClientes->message);
        }

        $consultarClientes = $consultarClientes->message;

        return view('catalogos.clientes', compact('consultarClientes'));
    }

    public function ClienteDetails(Request $request)
    {
        $ClienteInfo = $this->clienteController->consultarClientePorId($request);
        $_propuestas = $this->propuestaController->getPropuestasByClient($ClienteInfo->idCliente);

        return view('catalogos.editarcliente', compact('ClienteInfo','_propuestas'));
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
}
