<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CRUD
{
    public function index();
    public function nuevo();
    public function guardar(Request $request);
    public function editar($id);
    public function borrar($id);
}
