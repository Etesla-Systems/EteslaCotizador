@extends('layouts.app')
@section('window', 'Clientes')
@section('current-content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="subtitle-window">Clientes</h3>
</div>
<div class="table-responsive card-section p-3">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Direcci&oacute;n</th>
                <th scope="col">Fecha Alta</th>
                <th scope="col"><i class="uil uil-cog"></i></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="/clientes/editar" class="btn btn-action border-bottom"><i class="uil uil-pen"></i></a>
                        <a class="btn btn-action border-bottom"><i class="uil uil-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>1,002</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="/clientes/editar" class="btn btn-action border-bottom"><i class="uil uil-pen"></i></a>
                        <a class="btn btn-action border-bottom"><i class="uil uil-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>1,003</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="/clientes/editar" class="btn btn-action border-bottom"><i class="uil uil-pen"></i></a>
                        <a class="btn btn-action border-bottom"><i class="uil uil-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>1,004</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>
                    <div class="btn-group" role="group">
                        <a href="/clientes/editar" class="btn btn-action border-bottom"><i class="uil uil-pen"></i></a>
                        <a class="btn btn-action border-bottom"><i class="uil uil-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <li class="page-item">
                <a class="page-link btn-action">Anterior</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link btn-action" href="#">Siguiente</a>
            </li>
        </ul>
    </nav>
</div>
@endsection