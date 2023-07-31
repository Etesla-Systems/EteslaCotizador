@extends('cotizador.includes.app')
@section('window', 'Clientes')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Cliente/Editar</h3>
        <a href="{{url('/clientes')}}" class="btn btn-azul2 border-bottom"><i class="bx bx-arrow-back"></i> Regresar</a>
    </div>
    @include('cotizador.includes.messages')
    <div class="container-fluid card-section">
        <div class="row pb-3">
            <form method="POST" class="row g-3 align-items-center" action="">
                @csrf
                <div class="col-md-4">
                    <label for="txtNombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="txtNombre" name="nombre" value="{{ $ClienteInfo->vNombrePersona }}">
                </div>
                <div class="col-md-4">
                    <label for="txtPaterno" class="form-label">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="txtPaterno" name="primerApellido" value="{{ $ClienteInfo->vPrimerApellido }}">
                </div>
                <div class="col-md-4">
                    <label for="txtMaterno" class="form-label">Apellido Materno:</label>
                    <input type="text" class="form-control" id="txtMaterno" name="segundoApellido" value="{{ $ClienteInfo->vSegundoApellido }}">
                </div>
                <div class="col-md-4">
                    <label for="txtTelefono" class="form-label">Tel&eacute;fono:</label>
                    <input type="tel" class="form-control" id="txtTelefono" name="" value="{{ $ClienteInfo->vTelefono }}">
                </div>
                <div class="col-md-4">
                    <label for="txtMovil" class="form-label">Tel&eacute;fono Celular:</label>
                    <input type="tel" class="form-control" id="txtMovil" name=""  value="{{ $ClienteInfo->vCelular }}">
                </div>
                <div class="col-md-4">
                    <label for="txtEmail" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="txtEmail" name="" value="{{ $ClienteInfo->vEmail }}">
                </div>
                <div class="col-md-4">
                    <label for="inpCPCliente" class="form-label">CP:</label>
                    <input type="number" class="form-control" id="txtCP" name="txtCP" value="{{ $ClienteInfo->cCodigoPostal }}" >
                </div>
                <div class="col-md-4">
                    <label for="inpCalleCliente" class="form-label">Calle:</label>
                    <input type="text" class="form-control" id="txtCalle" name="txtCalle" value="{{ $ClienteInfo->vCalle }}">
                </div>
                <div class="col-md-4">
                    <label for="inpMunicipioCliente" class="form-label">Municipio:</label>
                    <input type="text" class="form-control" id="txtMunicipio" name="txtMunicipio" value="{{ $ClienteInfo->vMunicipio }}">
                </div>
                <div class="col-md-4">
                    <label for="inpCiudadCliente" class="form-label">Ciudad:</label>
                    <input type="text" class="form-control" id="txtCiudad" name="txtCiudad" value="{{ $ClienteInfo->vCiudad }}">
                </div>
                <div class="col-md-4">
                    <label for="inpEstadoCliente" class="form-label">Ciudad:</label>
                    <input type="text" class="form-control" id="txtEstado" name="txtEstado" value="{{ $ClienteInfo->vEstado }}">
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
                @unless($_propuestas)
                    <table class="table table-hover">
                        <thead>
                            <tr class="celda-azul">
                                <th colspan="4" class="tabla-centrada font-white"><h6><strong>PROPUESTAS </strong><i class="uil uil-invoice"></i></h6></th>
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
                    <tbody>
                    @foreach($_propuestas as $Propuesta)
                        <tr>
                            <td id="tdTipoPropuesta"  class="font-weight-bold text-justify" title="Tipo de propuesta">
                                {{ $Propuesta->cTipoCotizacion }}
                            </td>
                            <td id="tdFechaCreacion" class="text-center" title="Fecha de creacion">
                                {{ date('d-M-y', strtotime($Propuesta->created_at)) }}
                            </td>
                            <td id="tdFechaExpiracion" class="text-center" title="Fecha de expiracion">
                                {{ date('d-M-y', strtotime($Propuesta->expired_at)) }}
                            </td>
                            <td>
                                <div class="tabla-centrada" >
                                    <a class="btn btn-rojo border-bottom"><i class="uil uil-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endunless
            </div>
        </div>
    </div>
@endsection
