@extends('layouts.app')
@section('window', 'Oficinas')
@section('current-content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Roles</h3>
        <button type="button" class="btn btn-action border-bottom" data-bs-toggle="modal" data-bs-target="#mdOficina"><i class="bx bx-plus-circle"></i> Nuevo</button>
    </div>
    @include('layouts.messages')
    <div class="table-responsive card-section p-3">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col"><i class="uil uil-cog"></i></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($oficinas as $item)
                <tr>
                    <td>{{ $item->idOficina }}</td>
                    <td>{{ $item->vOficina }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-action border-bottom"><i class="uil uil-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <p class="text-center">Sin registros</p>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="mdOficina" tabindex="-1" aria-labelledby="mdOficinaTitulo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="subtitle-window" id="mdOficinaTitulo">Agregar</h5>
                </div>
                <div class="modal-body">
                    <form class="row g-3 align-items-center" method="POST" action="{{ route('guardaroficina') }}">
                        @csrf
                        <div class="col-md-12">
                            <label for="txtNombreArea" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="txtNombreArea" name="nombrearea">
                        </div>
                        <div class="d-flex justify-content-end col-md-12 mt-3">
                            <button type="button" class="btn btn-back border-bottom" data-bs-dismiss="modal"><i class="bx bx-x-circle"></i> Cerrar</button>
                            <button type="submit" class="btn btn-action border-bottom"><i class="bx bx-save"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
