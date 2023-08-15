@extends('cotizador.includes.app')
@section('window', 'Individual')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Individual</h3>
    </div>
    <!-- Inicia apartado de clientes -->
    @include('cotizador.pages.vendedor.clientesCotizador')
    <!-- Inicia apartado de clientes -->

    <!-- Div del contenedor principal -->
    <div class="container-fluid card-section mt-3">
        <div>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                <h6>Cotización</h6>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Seleccione un panel</label>
                    <select class="form-select" id="optPaneles" name="optPaneles" onchange="">
                        <option selected value="">Elige una opción</option>
                        @foreach($vPaneles as $paneles)
                            <option value="{{ $paneles->idPanel }}">{{ $paneles->vNombreMaterialFot }}</option>
                        @endforeach
                    </select>
                    <div class="mt-2">
                        <label class="form-label">Ingrese la cantidad de paneles</label>
                        <input type="text" class="form-control" id="inpCantPaneles" >
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="mn-1">Seleccione un inversor:</label>
                    <select class="form-select" id="optInversores" onchange="">
                        <option selected>Elige una opción</option>
                        @foreach($vInversores as $inversor)
                            <option title="{{ $inversor->vTipoInversor }}" value="{{ $inversor->idInversor }}">{{ $inversor->vNombreMaterialFot }}</option>
                        @endforeach
                    </select>
                    <div class="mt-2">
                        <label class="form-label">Ingrese la cantidad de inversores</label>
                        <input type="text" class="form-control"  id="inpCantInversores"  >
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Seleccione una estructura</label>
                    <select id="optEstructuras" class="form-select" onchange="">
                        <option selected value="">Elige una opción</option>
                        @foreach($vEstructuras as $estructura)
                            <option value="{{ $estructura->idEstructura }}" >{{ $estructura->vMarca }}</option>
                        @endforeach
                    </select>
                    <div class="mt-2">
                        <label class="form-label">Ingrese la cantidad de estructuras</label>
                        <input type="text" class="form-control" id="inpCantEstructuras" value="">
                    </div>
                </div>

            </div>
        </div>

        <!-- Div contención de los botones del apartado de cotización -->
        <div class="row d-flex justify-content-center text-center">

            <!-- Inicia div de contención del botón de "Ajustes" -->
            <div class="col mt-3" id="divbtnAjustes">
                <button class="btn btn-azul2 btn-estandar" type="button" id="btnModalAjustePropuesta" data-bs-toggle="modal"
                        data-bs-target="#modalAjustes"><i class="uil uil-setting"></i> Ajustes
                </button>
                <div class="modal fade" id="modalAjustes" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajustes</h5>
                                <!-- Botón "Cerrar" del modal "Agregados" -->
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="uil uil-multiply"></i></button>
                                <!-- Fin botón "Cerrar" del modal "Agregados" -->
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label>Descuento que desee aplicar </label>
                                    <input id="inpSliderDescuento" type="range" min="0" max="30" class="form-range" value="0" oninput="rangeValueDescuento.value=inpSliderDescuento.value" onchange="sliderModificarPropuesta();">
                                    <output id="rangeValueDescuento"></output>%
                                </div>
                                <div>
                                    <label>Aumento en el costo del proyecto </label>
                                    <input id="inpSliderAumento" type="range" min="0" max="100" class="form-range" value="0" oninput="rangeValueAumento.value=inpSliderAumento.value">
                                    <output id="rangeValueAumento"></output>%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Finaliza div de contención del botón de "Ajustes" -->

            <!-- Inicia div de contención del botón de "Agregados" -->
            <div class="col mt-3" id="divbtnAgregados">
                <!-- Botón "Agregados" -->
                <button class="btn btn-azul2 btn-estandar" type="button" id="btnAgregados" title="Agregados"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="uil uil-plus-circle"></i>
                    Agregados
                </button>
                <!-- Inicia div de contención del modal de "Agregados" -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> <!-- Inicio de la parte superior del modal de "Agregados" -->
                                <div>
                                    <h5 class="modal-title">Agregados</h5>
                                    <div class="form-group col-lg-12 mt-4">
                                        <label for="costoTotalAgregados">Costo total: </label>
                                        <p id="costoTotalAgregados"></p>
                                    </div>
                                </div>
                                <!-- Botón "Cerrar" del modal "Agregados" -->
                                <div class="close">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
                                </div>
                                <!-- Fin botón "Cerrar" del modal "Agregados" -->
                            </div> <!-- Fin de la parte superior del modal de "Agregados" -->
                            <div class="modal-body"> <!-- Inicio del cuepro del modal de "Agregados" -->
                                <div class="container-fluid">
                                    <div class="row pb-3 g-3">
                                        <!-- Inicio campos para generar un nuevo "Agregado" -->
                                        <div class="col pb-3">
                                            <form class="">
                                                <div class="row g-3">
                                                    <!-- Cantidad -->
                                                    <div class="form-group col-md-3">
                                                        <label for="inpCantidadAg">Cantidad</label>
                                                        <input id="inpCantidadAg" type="number" class="form-control inpAg">
                                                    </div>
                                                    <!-- Concepto -->
                                                    <div class="form-group col-md-5">
                                                        <label for="inpAgregado">Concepto</label>
                                                        <input id="inpAgregado" type="text" class="form-control inpAg">
                                                    </div>
                                                    <!-- Precio -->
                                                    <div class="form-group col-sm-2">
                                                        <label for="inpPrecioAg">Precio</label>
                                                        <input id="inpPrecioAg" type="number" min=".50" step="any"
                                                               class="form-control inpAg">
                                                    </div>
                                                    <!-- Botón "Nuevo agregado" -->
                                                    <div class="form-group col-sm-2 mt-5">
                                                        <button id="btnAddAg" type="button" class="btn btn-azul2"  onclick="addAgregado();"><i class="uil uil-plus"></i></button>
                                                    </div>
                                                    <!-- Fin botón "Nuevo agregado" -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Inicia tabla de "Agregados" -->
                                        <div class="col-xl table-responsive-xl">
                                            <table class="table table-sm" id="tblAgregados">
                                                <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Concepto</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Precio unit.</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">Acción</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <!-- Contenido dinamico c/JavaScript -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Fin tabla de "Agregados" -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin div de contención del botón de "Agregados" -->

            <!-- Inicio div de contención del botón de "Calcular" -->
            <div class="col mt-3" id="divbtnCalcular">
                <button class="btn btn-azul2 btn-estandar" type="button" id="calcularCotIndiv" onclick="calcularCotizacionIndividual()"><i
                        class="uil uil-calculator"></i> Calcular
                </button>
            </div>
            <!-- Fin div de contención del botón de "Generar" -->

            <!-- Inicio div de contención del botón de "Generar" -->
            <div class="col mt-3" id="divbtnGenerarEquipos">
                <button class="btn btn-azul2 btn-estandar" type="button" id="generarPDF" onclick="generarEntregable()">
                    <i class="uil uil-import"></i> Generar PDF
                </button>
            </div>
            <!-- Fin div de contención del botón de "Generar" -->
        </div>
        <!-- Fin div contención de los botones del apartado de cotización -->

        <!-- Inicia apartado de "Propuesta" (configuración del pdf) -->
        <div class="row mt-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap">
                <p><i class="uil uil-setting"></i> Configuración del PDF</p>
                <!-- Botón de configuración del PDF -->
                <div class="justify-content-end move">
                    <label class="form-check-label" for="flexCheckDefault">
                        ¿Desea que los subtotales se muestren desglozados?
                    </label>
                </div>
                <div class="form-check justify-content-end ">
                    <input class="form-check-input" type="checkbox" value="" id="swtSubtDesglozados">
                </div>
            </div>
        </div>

    </div>

    <!--Resultados-->
    <div class="container-fluid card-section mt-4">
        <div class="row pb-3 g-3">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                <h6>Resultados</h6>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row m-3 d-flex flex-wrap" id="divTablasCotInd">
                <div class="col">
                    <table class="table table-hover">
                        <thead class="celda-azul">
                        <th colspan="2" class="font-white">POTENCIA <i class="uil uil-bolt-alt"></i></th>
                        </thead>
                        <tr>
                            <td>Potencia instalada</td>
                            <td id="resPotenciaInstalada"></td>
                        </tr>
                        <tr>
                            <td>Costo por panel(es)</td>
                            <td id="resCostoPanel"></td>
                        </tr>
                        <tr>
                            <td>Costo por inversor(es)</td>
                            <td id="resCostInversor"></td>
                        </tr>
                        <tr>
                            <td>Costo por estructura(s)</td>
                            <td id="resCostEstruct"></td>
                        </tr>
                    </table>
                </div>

                <div class="col">
                    <div>
                        <table class="table table-hover">
                            <thead class="celda-azul">
                            <th colspan="2" class="font-white">COSTOS <i class="uil uil-usd-circle"></i></th>
                            </thead>
                            <tr>
                                <td>Costo de viáticos</td>
                                <td id="resCostoViaticos"></td>
                            </tr>
                            <tr>
                                <td>Costo de mano de obra y otros</td>
                                <td id="resCostoMO"></td>
                            </tr>
                            <tr>
                                <td>Costo fletes</td>
                                <td id="resCostoFletes"></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col">
                    <table class="table table-hover">
                        <thead class="celda-azul">
                        <th class="font-white">$</th>
                        <th class="font-white">TOTAL S/IVA</th>
                        <th class="font-white">TOTAL C/IVA</th>
                        </thead>
                        <tr>
                            <td>USD</td>
                            <td id="tdSubtotalUSD"></td>
                            <td id="tdTotalUSD"></td>
                        </tr>
                        <tr>
                            <td>MXN</td>
                            <td id="tdSubtotalMXN"></td>
                            <td id="tdTotalMXN"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
