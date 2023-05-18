@extends('cotizador.includes.app')
@section('window', 'Clientes')
@section('current-content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Clientes</h3>
        <a href="" class="btn btn-verde"><i class="bx bx-plus-circle"></i> Agregar nuevo cliente</a>
    </div>
    <div class="table-responsive card-section p-3">
        <table class="table table-hover">
            <thead>
            <tr class="tabla-centrada celda-azul">
                <th scope="col" class="font-white">Nombre</th>
                <th scope="col" class="font-white">A. Paterno</th>
                <th scope="col" class="font-white">A. Materno</th>
                <th scope="col" class="font-white">Tel&eacute;fono</th>
                <th scope="col" class="font-white">Tel. Movil</th>
                <th scope="col" class="font-white">Email</th>
                <th scope="col" class="font-white"><i class="uil uil-cog"></i></th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="tabla-centrada" >
                            <a href="/clientes/editar" class="btn btn-gris border-bottom me-2"><i class="uil uil-pen"></i></a>
                            <a class="btn btn-rojo border-bottom"><i class="uil uil-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="7">
                        <p class="text-center">Sin registros</p>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
