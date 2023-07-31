<?php

namespace App\APIModels;

class APIVendedor extends GuzzleHttpRequest
{
    public function listarPorUsuario($request)
    {
        return $this->put("lista-clientes-usuario", $request);
    }

    public function precioDelDolar()
    {
        return $this->get('tipoCambioDolar');
    }
}
