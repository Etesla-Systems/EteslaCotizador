<?php

namespace App\Http\Controllers;

use App\Interfaces\CRUD;
use Illuminate\Http\Request;
use App\Tarifa;
use Throwable;

class TarifaController extends Controller implements CRUD
{

    public function index()
    {
        $tarifa = Tarifa::all();
        return view('catalogos.tarifa', ['tarifas' => $tarifa]);
    }

    public function nuevo()
    {
        return view('catalogos.editartarifa');
    }

    public function guardar(Request $request)
    {
        try {
            $tarifa = new Tarifa();
            $tarifa->vNombreTarifa = $request->nombre;
            $tarifa->siNivel = $request->nivel;
            $tarifa->siVerano = $request->verano;
            $tarifa->iRango = $request->rango;
            $tarifa->fPrecio = $request->precio;
            $tarifa->save();
            return redirect()->action('TarifaController@index')->with('success', 'Registro guardado correctamente');
        } catch (Throwable $e){
            report($e);
            return redirect()->action('TarifaController@index')->with('error', $e->getMessage());
        }
    }

    public function editar($id)
    {
        // TODO: Implement editar() method.
    }

    public function borrar($id)
    {
        // TODO: Implement borrar() method.
    }
}
