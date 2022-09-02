@extends('layouts.app')
@section('window', 'Personas')
@section('current-content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Personas</h3>
        <a href="{{ url("/personas/nuevo") }}" class="btn btn-action border-bottom"><i class="bx bx-plus-circle"></i> Nuevo</a>
    </div>
    <div class="table-responsive card-section p-3">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">A. Paterno</th>
                <th scope="col">A. Materno</th>
                <th scope="col">Tel&eacute;fono</th>
                <th scope="col">Tel. Movil</th>
                <th scope="col">Email</th>
                <th scope="col"><i class="uil uil-cog"></i></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($personas as $item)
                <tr>
                    <td>{{ $item->vNombrePersona }}</td>
                    <td>{{ $item->vPrimerApellido }}</td>
                    <td>{{ $item->vSegundoApellido }}</td>
                    <td>{{ $item->vTelefono }}</td>
                    <td>{{ $item->vCelular }}</td>
                    <td>{{ $item->vEmail }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="/clientes/editar" class="btn btn-action border-bottom"><i class="uil uil-pen"></i></a>
                            <a class="btn btn-action border-bottom"><i class="uil uil-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        <p class="text-center">Sin registros</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
