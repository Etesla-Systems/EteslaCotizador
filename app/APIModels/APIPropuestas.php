<?php

namespace App\APIModels;

class APIPropuestas extends GuzzleHttpRequest
{
    public function getPropuestasByCliente($request)
    {
        return $this->put("getPropuestaByCliente", $request);
    }

    public function save($request)
    {
        return $this->post("guardar-propuesta",$request);
    }

    public function delete($request)
    {
        return $this->put("eliminar-propuesta",$request);
    }

    public function getDetailsPropuestaById($request)
    {
        return $this->get("details-propuesta-id",$request);
    }
}
