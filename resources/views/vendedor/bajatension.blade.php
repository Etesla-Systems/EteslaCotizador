@extends('layouts.app')
@section('window', 'Baja Tension')
@section('current-content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="subtitle-window">Baja tensi&oacute;n</h3>
</div>
<div class="container-fluid card-section">
    <div class="row">
        <div class="col-md-12 py-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nombre del cliente" aria-label="" aria-describedby="button-addon2">
                <button class="btn btn-action border-bottom" type="button" id="button-addon2"><i class="uil uil-search"></i> Buscar</button>
            </div>
        </div>
    </div>
    <div class="row pb-3 g-3">
        <div class="d-flex justify-content-between col-md-12 border-bottom py-2">
            <h6>Informaci&oacute;n general</h6>
            <button class="btn btn-action border-bottom" type="button" id="button-addon2"><i class="uil uil-plus-circle"></i> Agregar cliente</button>
        </div>
        <div class="col-md-6">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="inputAddress" value="Ejemplo" readonly>
        </div>
        <div class="col-md-3">
            <label class="form-label">Telef&oacute;no:</label>
            <input type="text" class="form-control" id="inputAddress" value="Ejemplo" readonly>
        </div>
        <div class="col-md-3">
            <label class="form-label">Telef&oacute;no celular:</label>
            <input type="text" class="form-control" id="inputAddress" value="Ejemplo" readonly>
        </div>
        <div class="col-md-3">
            <label class="form-label">Correo electr&oacute;nico:</label>
            <input type="text" class="form-control" id="inputAddress" value="Ejemplo" readonly>
        </div>
    </div>
</div>
<div class="container-fluid card-section mt-3">
    <div class="row pb-3 g-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
            <h6>Datos de consumo</h6>
        </div>
        <div class="col-md-6">
            <label class="form-label">Tarifa actual:</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-6">
            <div class="form-check form-switch position-relative top-50 start-0">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                <label class="form-check-label" for="flexSwitchCheckChecked">Generar promedio</label>
            </div>
        </div>
        <div class="col-md-2">
            <label class="form-label">1° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="200" readonly>
        </div>
        <div class="col-md-2">
            <label class="form-label">2° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="200" readonly>
        </div>
        <div class="col-md-2">
            <label class="form-label">3° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="200" readonly>
        </div>
        <div class="col-md-2">
            <label class="form-label">4° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="200" readonly>
        </div>
        <div class="col-md-2">
            <label class="form-label">5° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="200" readonly>
        </div>
        <div class="col-md-2">
            <label class="form-label">6° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="200" readonly>
        </div>
        <div class="col-md-12 d-flex justify-content-end">
            <button class="btn btn-action border-bottom" type="button" id="button-addon2"><i class="uil uil-check-circle"></i> Calcular</button>
        </div>
    </div>
</div>
<div class="container-fluid card-section my-3">
    <div class="row pb-3 g-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
            <h6>Cotizaci&oacute;n</h6>
        </div>
        <div class="col-md-6 card-section-alt p-2">
            <div class="row">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap">
                    <p><i class="uil uil-abacus"></i> Combinaciones</p>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Elegir equipos</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Tarifa actual:</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-check form-switch position-relative top-50 start-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Guardar
                        </label>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-action border-bottom" type="button" id="button-addon2"><i class="uil uil-bolt"></i> Generar</button>
                </div>
            </div>
            <div class="row pt-3">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap">
                    <p><i class="uil uil-abacus"></i> Equipos</p>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Elegir combinacion</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 card-section-alt p-2">
            <div class="row">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap">
                    <p><i class="uil uil-presentation-play"></i> Propuesta</p>
                    <button class="btn btn-action border-bottom" type="button" id="button-addon2"><i class="uil uil-file-edit-alt"></i> Config. PDF</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection