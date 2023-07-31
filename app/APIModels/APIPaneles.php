<?php

namespace App\APIModels;

class APIPaneles extends GuzzleHttpRequest
{
    public function view()
    {
        return $this->get("lista-paneles");
    }

    public function delete($request)
    {
        return $this->put("eliminar-panel", $request);
    }

    public function search($request)
    {
        return $this->put("buscar-panel", $request);
    }

    public function edit($request)
    {
        return $this->put("editar-panel", $request);
    }

    public function add($request)
    {
        return $this->post("agregar-panel", $request);
    }
}
