<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use \Firebase\JWT\ExpiredException;

class VerificacionController extends Controller
{
    public static function validarToken($token)
    {
        $topSecret = 'eTeslaSecret';


        if(!empty($token))
        {
            try {
                return $decode = JWT::decode($token, new Key($topSecret, 'HS256'));
                //dd($decode);
            } catch (ExpiredException $e) {
                return false;
            }
        }
        return false;
    }
}
