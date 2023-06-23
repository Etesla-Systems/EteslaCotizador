<?php

namespace App\Http\Controllers;

use App\APIModels\APIPaneles;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    protected $paneles;

    public function __construct(APIPaneles $paneles)
    {
        $this->paneles = $paneles;
    }

}
