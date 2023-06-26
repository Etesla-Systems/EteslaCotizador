@extends('cotizador.includes.app')
@section('window', 'Clientes')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Clientes</h3>
        <button class="btn btn-verde" type="button" id="button-addon2 " data-bs-toggle="collapse" data-bs-target="#collapseAgregarCliente" aria-expanded="false" aria-controls="collapseWidthExample"><i class="uil uil-user-plus"></i> Agregar nuevo cliente</button>
    </div>

    <div class="mt-1">
        <div>
            <div class="collapse" id="collapseAgregarCliente">
                <div class="card card-body">
                    <div class="row pb-3 g-3">
                        <div class="d-flex justify-content-between col-md-12 border-bottom py-2">
                            <!-- Botón de agregar cliente -->
                            <h6>Agregue la informaci&oacute;n general del cliente</h6>
                        </div>
                        <!-- Inician campos para agregar cliente o cargarlo -->
                        <div class="col-md-3">
                            <label class="form-label"><strong>*</strong> Nombre:</label>
                            <input type="text" class="form-control" id="inputAddress" value="" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>*</strong> Primer apellido:</label>
                            <input type="text" class="form-control" id="inputAddress" value="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Telef&oacute;no: </label>
                            <input type="text" class="form-control" id="inputAddress" value="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>*</strong> Telef&oacute;no celular:</label>
                            <input type="text" class="form-control" id="inputAddress" value="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Correo electr&oacute;nico:</label>
                            <input type="text" class="form-control" id="inputAddress" value="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>*</strong> Dirección (calle):</label>
                            <input type="text" class="form-control" id="inputAddress" value="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>*</strong> CP: </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inputAddress" value="">
                                <button class="btn btn-azul2" type="button" id="button-addon2"><i class="uil uil-search"></i></button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>*</strong> Ciudad:</label>
                            <input type="text" class="form-control" id="inputAddress" value="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>*</strong> Municipo:</label>
                            <input type="text" class="form-control" id="inputAddress" value="">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><strong>*</strong> Estado:</label>
                            <input type="text" class="form-control" id="inputAddress" value="">
                        </div>

                        <div class="col-md-3 mt-5">
                            <button class="btn btn-gris" type="button" id="button-addon2"><i class="uil uil-save"></i> Guardar nuevo cliente</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive card-section p-3">
        @if(@isset($consultarClientes))
            @unless($consultarClientes)
                <table class="table table-hover">
                    <thead>
                    <tr class="tabla-centrada celda-azul">
                        <th scope="col" class="font-white">Nombre</th>
                        <th scope="col" class="font-white">A. Paterno</th>
                        <th scope="col" class="font-white">A. Materno</th>
                        <th scope="col" class="font-white">Ciudad</th>
                        <th scope="col" class="font-white">Estado</th>
                        <th scope="col" class="font-white">CP</th>
                        <th scope="col" class="font-white"><i class="uil uil-cog"></i></th>
                    </tr>
                    </thead>
                    <tr>
                        <td colspan="7">
                            <p class="text-center">Sin registros</p>
                        </td>
                    </tr>
                </table>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr class="tabla-centrada celda-azul">
                        <th scope="col" class="font-white">Nombre</th>
                        <th scope="col" class="font-white">A. Paterno</th>
                        <th scope="col" class="font-white">A. Materno</th>
                        <th scope="col" class="font-white">Ciudad</th>
                        <th scope="col" class="font-white">Estado</th>
                        <th scope="col" class="font-white">CP</th>
                        <th scope="col" class="font-white"><i class="uil uil-cog"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($consultarClientes as $cliente)
                        <tr>
                            <td>{{ $cliente->vNombrePersona }}</td>
                            <td>{{ $cliente->vPrimerApellido }}</td>
                            <td>{{ $cliente->vSegundoApellido }}</td>
                            <td>{{ $cliente->vCiudad }}</td>
                            <td>{{ $cliente->vEstado }}</td>
                            <td>{{ $cliente->cCodigoPostal }}</td>
                            <td>
                                <div class="tabla-centrada" >
                                    <a href="{{ url('editarcliente',[$cliente->idCliente]) }}" class="btn btn-gris border-bottom me-2"><i class="uil uil-pen"></i></a>
                                    <a href=""class="btn btn-rojo border-bottom"><i class="uil uil-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endunless
        @endif
    </div>
@endsection
