<?php

namespace App\Http\Controllers;

use App\APIModels\APIInversores;
use Illuminate\Http\Request;

class InversorController extends Controller
{
    protected $inversores;

    public function __construct(APIInversores $inversores)
    {
        $this->inversores = $inversores;
    }

    public function index()
    {
        if ($this->validarSesion() == 0) {
            return redirect('/')->with('status-fail', 'Debe iniciar sesión para acceder al sistema.');
        }
        if ($this->validarSesion() == 1) {
            return redirect('index')->with('status-fail', 'Solo los administradores pueden acceder a esta vista.');
        }
        $vInversores = $this->inversores->view();

        return view('cotizador.pages.vendedor.individual', compact('vInversores'));
    }
}
