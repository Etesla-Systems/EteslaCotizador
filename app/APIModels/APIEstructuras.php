<?php

namespace App\APIModels;

class APIEstructuras extends GuzzleHttpRequest
{
    public function view()
    {
        return $this->get("lista-estructuras");
    }

    public function add($request)
    {
        return $this->post("agregar-estructura", $request);
    }

    public function delete($request)
    {
        return $this->put("eliminar-estructura", $request);
    }

    public function search($request)
    {
        return $this->put("buscar-estructura", $request);
    }

    public function update($request)
    {
        return $this->put("editar-estructura", $request);
    }
}
