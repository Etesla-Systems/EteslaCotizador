@extends('cotizador.includes.app')
@section('window', 'Clientes')
@section('current-content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Cliente/Editar</h3>
        <a href="{{ route('clientes') }}" class="btn btn-azul2 border-bottom"><i class="bx bx-arrow-back"></i> Regresar</a>
    </div>
    @include('cotizador.includes.messages')
    <div class="container-fluid card-section">
        <div class="row pb-3">
            <form method="POST" class="row g-3 align-items-center" action="">
                @csrf
                <div class="col-md-4">
                    <label for="txtNombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="txtNombre" name="">
                </div>
                <div class="col-md-4">
                    <label for="txtPaterno" class="form-label">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="txtPaterno" name="">
                </div>
                <div class="col-md-4">
                    <label for="txtMaterno" class="form-label">Apellido Materno:</label>
                    <input type="text" class="form-control" id="txtMaterno" name="">
                </div>
                <div class="col-md-4">
                    <label for="txtTelefono" class="form-label">Tel&eacute;fono:</label>
                    <input type="tel" class="form-control" id="txtTelefono" name="">
                </div>
                <div class="col-md-4">
                    <label for="txtMovil" class="form-label">Tel&eacute;fono Celular:</label>
                    <input type="tel" class="form-control" id="txtMovil" name="">
                </div>
                <div class="col-md-4">
                    <label for="txtEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="txtEmail" name="">
                </div>
                <div class="d-flex justify-content-end col-md-12">
                    <button type="submit" class="btn btn-gris border-bottom mx-1"><i class="bx bx-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid card-section mt-3">
        <div class="row">
            <div class="mt-2">
                <table class="table table-hover">
                    <thead>
                        <tr class="celda-azul">
                            <th colspan="4" class="tabla-centrada font-white"><h6><strong>PROPUESTAS </strong><i class="uil uil-invoice"></i></h6></th>
                        </tr>
                        <tr class="tabla-centrada">
                            <td>Tipo</td>
                            <td>Creación</td>
                            <td>Expiración</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>

                    <tr>

                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
