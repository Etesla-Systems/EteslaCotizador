<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oficina;
use Throwable;

class OficinaController extends Controller
{
    public function index() {
        $oficinas = Oficina::all();
        return view('catalogos.oficina', ['oficinas' => $oficinas]);
    }

    public function guardar(Request $request) {
        try {
            $oficina = new Oficina();
            $oficina->vOficina = $request->nombrearea;
            $oficina->save();
            return redirect()->action('OficinaController@index')->with('success', 'Registro guardado correctamente');
        } catch (Throwable $e) {
            return redirect()->action('OficinaController@index')->with('error', $e->getMessage());
        }
    }
}
