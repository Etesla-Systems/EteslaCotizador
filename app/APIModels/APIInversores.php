<?php

namespace App\APIModels;

class APIInversores extends GuzzleHttpRequest
{
    public function view()
    {
        return $this->get("lista-inversores");
    }

    public function delete($request)
    {
        return $this->put("eliminar-inversor", $request);
    }

    public function search($request)
    {
        return $this->put("buscar-inversor", $request);
    }

    public function edit($request)
    {
        return $this->put("editar-inversor", $request);
    }

    public function add($request)
    {
        return $this->post("agregar-inversor", $request);
    }

    public function inversores_selectos($request)
    {
        return $this->post("inversores-selectos", $request);
    }

    public function obtenerMicroInversores($request)
    {
        return $this->put("listar-micros", $request);
    }
}
