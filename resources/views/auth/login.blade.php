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
