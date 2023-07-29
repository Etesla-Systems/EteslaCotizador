<?php

namespace App\Http\Controllers;

use App\APIModels\APIEstructuras;
use Illuminate\Http\Request;

class EstructuraController extends Controller
{
    protected $estructuras;

    public function __construct(APIEstructuras $estructuras)
    {
        $this->estructuras = $estructuras;
    }

    public function read()
    {
        $vEstructuras = $this->estructuras->view();
        $vEstructuras = response()->json($vEstructuras);

        return $vEstructuras;
    }
}
