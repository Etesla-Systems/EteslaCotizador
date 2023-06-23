@extends('auth/templateAuth')
@section('titleAuth')
    {{'Login'}}
@stop
@section('content')
<div class="container centrado">
    <div class="row">
        <div>
            <div class="row">
                <div class="font_center tipo2">
                    <h6 class="sub">¡Bienvenido al cotizador de eTesla!</h6>
                </div>
                <div class="font_center tipo1 mt-1">
                    <h2 class="titulo">Iniciar sesión</h2>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <form method="POST">
                        {{csrf_field()}}
                        <div class="row mt-2">
                            <div>
                                <label for="inputEmailLogin" class="base_color tipo2">Correo electronico</label>
                            </div>
                            <div>
                                <input type="email" class="form-control input1" id="inputEmailLogin" name="email" aria-describedby="emailHelp" placeholder="ejemplo@etesla.mx" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div>
                                <label for="inpPasswd" class="base_color tipo2">Contraseña</label>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control" id="inpPasswd" name="contrasenia" placeholder="********" required>
                                <div class="input-group-prepend">
                                    <button id="show_password" class="btn btn-azul2 btn-eye" type="button" name="showPassword" onclick="mostrarContrasenia()"><i class="uil uil-eye"></i></button>

                <div class="d-flex justify-content-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mt-2">
                            <label for="email" class="col-form-label text-md base_color tipo2">{{ __('Correo electrónico') }}</label>

                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label for="password" class="col-form-label text-md base_color tipo2">{{ __('Contraseña') }}</label>

                            <div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label base_color tipo2" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>

                                </div>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <button type="submit" class="btn btn-estandar btn-verde">Entrar</button><br>

                        <div class="row mt-4">
                            <div>
                                <button type="submit" class="btn btn-verde tipo2 btn-estandar">
                                    {{ __('Iniciar sesión') }}
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
