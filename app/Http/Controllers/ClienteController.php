<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personas;

class ClienteController extends Controller
{
    public function index() {
        $personas = Personas::all();
        return view('catalogos.clientes', ['personas' => $personas]);
    }
}
