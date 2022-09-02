<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personas;
use Throwable;

class PersonasController extends Controller
{
    public function index() {
        $personas = Personas::all();
        return view('catalogos.personas', ['personas' => $personas]);
    }

    public function guardar(Request $request) {
        try {
            $persona = new Personas();
            $persona->vNombrePersona = $request->nombre;
            $persona->vPrimerApellido = $request->paterno;
            $persona->vSegundoApellido = $request->materno;
            $persona->vTelefono = $request->telefono;
            $persona->vCelular = $request->movil;
            $persona->vEmail= $request->email;
            $persona->save();
            return redirect('/personas/nuevo')->with('success', 'Registro guardado correctamente');
        } catch (Throwable $e) {
            report($e);
            return redirect('/personas/nuevo')->with('error', $e->getMessage());
        }
    }

//    public function editar($idPersona) {
//        try {
//            $persona = Personas::find($idPersona);
//
//        } catch (Throwable $e) {
//            return redirect()->action('PersonasController@index')->with('error', $e->getMessage());
//        }
//    }
}
