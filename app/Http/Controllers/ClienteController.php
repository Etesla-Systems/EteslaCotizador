<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\APIModels\APICliente;


class ClienteController extends Controller
{
    protected $cliente;

    public function __construct(APICliente $cliente)
    {
        $this->cliente = $cliente;
    }
    public function consultarClientePorId(Request $request)
    {
        $clientee["id"] = $request->idCliente;
        $clienteEncontrado = $this->cliente->consultarClientePorId(['json' => $clientee]);
        $clienteEncontrado = $clienteEncontrado->message[0];

        return $clienteEncontrado;
    }

    public function consultarClientePorNombre(Request $request)
    {
        $clientee["idUsuario"] = session('dataUsuario')->idUsuario; //IdVendedor
        $clientee["nombre"] = $request->nombre;
        $clienteResult = $this->cliente->buscarClientePorNombre(['json' => $clientee]);
        return response()->json($clienteResult);
    }

    public function registrarCliente(Request $request)
    {
        $ruta = str_replace(url('/'), '', url()->previous());

        $cliente["idUsuario"] = session('dataUsuario')->idUsuario; //IdVendedor
        $cliente["nombre"] = $request->inpClienteNombre;
        $cliente["primerApellido"] = $request->inpClientePrimerAp;
        $cliente["segundoApellido"] = $request->inpClienteSegundoAp;
        $cliente["telefono"] = $request->inpClienteTelefono;
        $cliente["celular"] = $request->inpClienteCelular;
        $cliente["mail"] = $request->inpClienteMail;
        $cliente["codigoPostal"] = $request->inpCP;
        $cliente["municipio"] = $request->inpClienteMunicipio;
        $cliente["calle"] = $request->inpClienteCalle;
        $cliente["ciudad"] = $request->inpClienteCiudad;
        $cliente["estado"] = $request->inpClienteEstado;

        $registrarCliente = $this->cliente->insertarCliente(['json' => $cliente]);

        if ($registrarCliente->status == 200) {
            return redirect($ruta)->with('status-success', $registrarCliente->message);
        }
        else {
            return redirect($ruta)->with('status-fail', $registrarCliente->message);
        }
    }

}
