@extends('layouts.app')
@section('window', 'Nueva Tarifa')
@section('current-content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Nuevo/Editar</h3>
    </div>
    @include('layouts.messages')
    <div class="container-fluid card-section">
        <div class="row pb-3">
            <form method="POST" class="row g-3" action="{{ route('guardartarifa') }}">
                @csrf
                <div class="col-md-4">
                    <label for="txtNombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="txtNombre" name="nombre">
                </div>
                <div class="col-md-4">
                    <label for="txtNivel" class="form-label">Nivel:</label>
                    <input type="number" class="form-control" id="txtNivel" name="nivel">
                </div>
                <div class="col-md-4">
                    <label for="txtVerano" class="form-label">Verano:</label>
                    <input type="number" class="form-control" id="txtVerano" name="verano">
                </div>
                <div class="col-md-4">
                    <label for="txtRango" class="form-label">Rango:</label>
                    <input type="number" class="form-control" id="txtRango" name="rango">
                </div>
                <div class="col-md-4">
                    <label for="txtPrecio" class="form-label">Precio:</label>
                    <input type="number" class="form-control" id="txtPrecio" name="precio">
                </div>
                <div class="d-flex justify-content-end col-md-12">
                    <button type="submit" class="btn btn-action border-bottom mx-1"><i class="bx bx-save"></i> Guardar</button>
                    <a href="{{ url('tarifas') }}" class="btn btn-action border-bottom"><i class="bx bx-arrow-back"></i> Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
