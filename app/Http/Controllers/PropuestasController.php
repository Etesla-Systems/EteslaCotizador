<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\APIModels\APIPropuestas;
use Illuminate\Http\Request;

class PropuestasController extends Controller
{
    protected $propuesta;

    public function __construct(APIPropuestas $propuesta)
    {
        $this->propuesta = $propuesta;
    }

    public function getPropuestasByClient($idCliente)
    {
        $propuestas = $this->propuesta->getPropuestasByCliente(['json' => ['id' => $idCliente]]);
        $propuestas = $propuestas->message;

        return $propuestas;
    }

}
