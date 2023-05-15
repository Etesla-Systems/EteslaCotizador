<?php

namespace App\Http\Controllers;

use App\Interfaces\CRUD;
use Illuminate\Http\Request;
use App\Rol;
use Throwable;

class RolController extends Controller implements CRUD
{

    public function index()
    {
        $rol = Rol::all();
        return view('catalogos.rol', ['roles' => $rol]);
    }

    public function nuevo()
    {
        // TODO: Implement nuevo() method.
    }

    public function guardar(Request $request)
    {
        try {
            $rol = new Rol();
            $rol->sTipoUsuario = $request->nombrerol;
            $rol->save();
            return redirect()->action('RolController@index')->with('success', 'Registro guardado correctamente');
        } catch (Throwable $e) {
            report($e);
            return redirect()->action('RolController@index')->with('error', $e->getMessage());
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
