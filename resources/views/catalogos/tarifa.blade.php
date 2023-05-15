@extends('layouts.app')
@section('window', 'Tarifas')
@section('current-content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Tarifas</h3>
        <a href="{{ route('nuevatarifa') }}" class="btn btn-action border-bottom"><i class="bx bx-plus-circle"></i> Nuevo</a>
    </div>
    @include('layouts.messages')
    <div class="table-responsive card-section p-3">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nivel</th>
                <th scope="col">Verano</th>
                <th scope="col">Rango</th>
                <th scope="col">Precio</th>
                <th scope="col"><i class="uil uil-cog"></i></th>
            </tr>
            </thead>
            <tbody>
            @forelse ($tarifas as $item)
                <tr>
                    <td>{{ $item->idTarifa }}</td>
                    <td>{{ $item->vNombreTarifa }}</td>
                    <td>{{ $item->siNivel }}</td>
                    <td>{{ $item->siVerano }}</td>
                    <td>{{ $item->iRango }}</td>
                    <td>{{ $item->fPrecio }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="#" class="btn btn-action border-bottom"><i class="uil uil-pen"></i></a>
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
