<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\VerificacionController;
use Illuminate\Http\Request;
use App\APIModels\APIUsuario;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    protected $usuario;

    public function __construct(APIUsuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function index()
    {
        if (session()->has('dataUsuario')) {
            if ($this->redireccionarRol() == 1) {
                //return redirect('login');
            }
            if ($this->redireccionarRol() == 2) {
                //return redirect('operations');
            }
            if ($this->redireccionarRol() == 3) {
                //return view('index');
            }
            if ($this->redireccionarRol() == 4) {
                //return redirect('engineer');
            }
            if ($this->redireccionarRol() == 5) {
                return redirect('vendedor');
            }
        }
        return view('auth/login');
    }

    public function paginaPrincipal()
    {
        if (session()->has('dataUsuario')) {
            if ($this->redireccionarRol() == 1) {
                //return redirect('admin');
            }
            if ($this->redireccionarRol() == 2) {
                //return redirect('operations');
            }
            if ($this->redireccionarRol() == 3) {
                //return view('index');
            }
            if ($this->redireccionarRol() == 4) {
                //return redirect('engineer');
            }
            if ($this->redireccionarRol() == 5) {
                return redirect('vendedor');
            }
        }
        return view('auth/login');
    }

    public function mostrarRegistrarUsuario()
    {
        if (session()->has('dataUsuario')) {
            $this->redireccionarRol(session('dataUsuario')->rol);
        }
        return view('auth/register');
    }

    public function registrarUsuario(Request $request)
    {
        if ($request->rol == 2) { $request["tipoUsuario"] = 'Operaciones'; }
        if ($request->rol == 3) { $request["tipoUsuario"] = 'GerenteIng'; }
        if ($request->rol == 4) { $request["tipoUsuario"] = 'Ingeniero'; }
        if ($request->rol == 5) { $request["tipoUsuario"] = 'Vendedor'; }

        $registrarUsuario = $this->usuario->insertar(['json' => $request->all()]);

        if ($registrarUsuario->status == 200) {
            return redirect('/')->with('status-success', 'Verifique su dirección de correo electrónico para terminar el registro.');
        }
        else {
            return redirect('registro')->with('status-fail', $registrarUsuario->message);
        }
    }

    public function validarUsuario(Request $request)
    {
        $validarUsuario = $this->usuario->validar(['json' => $request->all()]);

        if($validarUsuario->status == 500){
            return redirect('/')->with('status-fail', $validarUsuario->message);
        }

        if (VerificacionController::validarToken($validarUsuario->message) == false){
            return redirect('/')->with('status-fail', 'Caducó su sesión.');
        } else {
            $data = verificacionController::validarToken($validarUsuario->message);
            session(['dataUsuario' => $data]);
        }

        return redirect('vendedor')->with('status-success', 'Credenciales correctas.');
    }


    public function visualizarPerfil()
    {
        if (session()->has('dataUsuario')) {
            $dataUsuario["id"] = session('dataUsuario')->idPersona;
            $usuario = $this->usuario->consultarUsuario(['json' => $dataUsuario]);
            $usuario = $usuario->message[0];
            $rol = session('dataUsuario')->rol;

            return view('template/profileUser', compact('usuario', 'usuario', 'rol'));
        }
        return redirect('/')->with('status-fail', 'Debe iniciar sesión antes.');
    }

    public function verificarEmail($token)
    {
        $key = 'eTeslaSecret';
        $encrypt = ['HS256'];

        //dd($token);

        if(!empty($token))
        {
            try {
                $decode = JWT::decode($token, $key, $encrypt);
                $verificacion = $this->usuario->verificacion(['json' => $decode]);

                if ($verificacion->status == 200) {
                    return redirect('/')->with('status-success', 'Se verificó correctamente su correo.');
                } else {
                    return redirect('/')->with('status-fail', 'Ocurrió un error al verificar su correo.');
                }
            } catch (\Exception $e) {
                return redirect('/')->with('status-fail', 'El correo de verificación ha expirado.');
            }
        } else {
            return redirect('/')->with('status-fail', 'Correo de verificación no válido.');
        }
    }

    public function cerrarSesion()
    {
        if (session()->has('dataUsuario')) {
            session()->forget('dataUsuario');
        }
        return redirect('/')->with('status-success', 'Salió de su sesión.');
    }

    public function redireccionarRol()
    {
        $rol = session('dataUsuario')->rol;

        if ($rol == 0 || $rol == 1) {
            return 1;
        }
        if ($rol == 2) {
            return 2;
        }
        if ($rol == 3) {
            return 3;
        }
        if ($rol == 4) {
            return 4;
        }
        if ($rol == 5) {
            return 5;
        }
        return 6;
    }


}
