@extends('layouts.app')
@section('window', 'Clientes')
@section('current-content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Nuevo/Editar</h3>
    </div>
    @include('layouts.messages')
    <div class="container-fluid card-section">
        <div class="row pb-3">
            <form method="POST" class="row g-3 align-items-center" action="{{ route('guardarpersona') }}">
                @csrf
                <div class="col-md-4">
                    <label for="txtNombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="txtNombre" name="nombre">
                </div>
                <div class="col-md-4">
                    <label for="txtPaterno" class="form-label">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="txtPaterno" name="paterno">
                </div>
                <div class="col-md-4">
                    <label for="txtMaterno" class="form-label">Apellido Materno:</label>
                    <input type="text" class="form-control" id="txtMaterno" name="materno">
                </div>
                <div class="col-md-4">
                    <label for="txtTelefono" class="form-label">Tel&eacute;fono:</label>
                    <input type="tel" class="form-control" id="txtTelefono" name="telefono">
                </div>
                <div class="col-md-4">
                    <label for="txtMovil" class="form-label">Tel&eacute;fono Celular:</label>
                    <input type="tel" class="form-control" id="txtMovil" name="movil">
                </div>
                <div class="col-md-4">
                    <label for="txtEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="txtEmail" name="email">
                </div>
                <div class="d-flex justify-content-end col-md-12">
                    <button type="submit" class="btn btn-action border-bottom mx-1"><i class="bx bx-save"></i> Guardar</button>
                    <a href="{{ url('personas') }}" class="btn btn-action border-bottom"><i class="bx bx-arrow-back"></i> Regresar</a>
                </div>
            </form>
        </div>
    </div>
{{--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">--}}
{{--    <h3 class="subtitle-window">Editar Cliente</h3>--}}
{{--</div>--}}
{{--<div class="container-fluid card-section">--}}
{{--    <div class="row pb-3">--}}
{{--        <form class="row g-3">--}}
{{--            <div class="col-md-4">--}}
{{--                <label for="inputEmail4" class="form-label">Nombre:</label>--}}
{{--                <input type="email" class="form-control" id="inputEmail4">--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <label for="inputPassword4" class="form-label">Apellido Paterno:</label>--}}
{{--                <input type="password" class="form-control" id="inputPassword4">--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <label for="inputAddress" class="form-label">Apellido Materno:</label>--}}
{{--                <input type="text" class="form-control" id="inputAddress" placeholder="">--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <label for="inputAddress2" class="form-label">Correo Electronico:</label>--}}
{{--                <input type="text" class="form-control" id="inputAddress2" placeholder="">--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <label for="inputCity" class="form-label">Tel&eacute;fono:</label>--}}
{{--                <input type="text" class="form-control" id="inputCity">--}}
{{--            </div>--}}
{{--            <div class="col-md-4">--}}
{{--                <label for="inputState" class="form-label">Tel&eacute;fono Celular:</label>--}}
{{--                <input type="text" class="form-control" id="inputCity">--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <label for="inputZip" class="form-label">C&oacute;digo Postal:</label>--}}
{{--                <input type="text" class="form-control" id="inputZip">--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <label for="inputZip" class="form-label">Calle y N&uacute;mero:</label>--}}
{{--                <input type="text" class="form-control" id="inputZip">--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <label for="inputZip" class="form-label">Colonia:</label>--}}
{{--                <input type="text" class="form-control" id="inputZip">--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <label for="inputZip" class="form-label">Municipio:</label>--}}
{{--                <input type="text" class="form-control" id="inputZip">--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <label for="inputZip" class="form-label">Estado:</label>--}}
{{--                <input type="text" class="form-control" id="inputZip">--}}
{{--            </div>--}}
{{--            <div class="d-flex justify-content-end col-md-12">--}}
{{--                <button type="submit" class="btn btn-action border-bottom mx-1"><i class="uil uil-save"></i> Guardar</button>--}}
{{--                <a href="/clientes" class="btn btn-action border-bottom"><i class="uil uil-left-arrow-from-left"></i> Regresar</a>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--    <div class="row py-3">--}}
{{--        <div class="col-md-12">--}}
{{--            <h6 class="border-bottom">Propuestas</h6>--}}
{{--        </div>--}}
{{--        <div class="col-md-12">--}}
{{--            <p>Sin Informaci&oacute;n</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
