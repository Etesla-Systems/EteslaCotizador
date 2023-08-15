@extends('cotizador.includes.app')
@section('window', 'Baja Tension')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Baja tensi&oacute;n</h3>
    </div>

    @include('cotizador.pages.vendedor.clientesCotizador')

    <div class="container-fluid card-section mt-3"> <!-- Inicia apartado de datos de consumo -->
        <div class="row pb-3 g-3">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                <h6>Datos de consumo</h6>
            </div>
            <div class="col-md-6"> <!-- Apartado de selección de tarifa del cliente -->
                <label class="form-label">Tarifa actual:</label>
                <select class="form-select" id="tarifa-actual" onchange="document.getElementById('btnCalcularPropuesta')">
                    <option selected>Elige una opción</option>
                    <option value="IC">Industrial a Comercial</option>
                    <option value="1">01 (Doméstico 500 kWh/bim)</option>
                    <option value="1a">1a (Doméstico 600 kWh/bim)</option>
                    <option value="1b">1b (Doméstico 800 kWh/bim)</option>
                    <option value="1c">1c (Doméstico 1,700 kWh/bim)</option>
                    <option value="1d">1d (Doméstico 2,000 kWh/bim)</option>
                    <option value="1e">1e (Doméstico 4,000 kWh/bim)</option>
                    <option value="1f">1f (Doméstico 5,000 kWh/bim)</option>
                    <option value="2">02 (Comercial hasta 25kwp)</option>
                </select>
            </div>
            <div class="col-md-6 mt-5">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="switch-2">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Generar promedio</label>
                </div>
            </div>
            <div class="col-md-2"> <!-- Inputs sobre información de consumo bimestral del cliente -->
                <label class="form-label">1° Bimestre:</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" id="men-val-1" name="men-1" min="0"  aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <span class="input-group-text" id="inpIkWh1">kwh</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label">2° Bimestre:</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" id="men-val-2" name="men-1" min="0"  aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <span class="input-group-text" id="inpIkWh2">kwh</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label">3° Bimestre:</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" id="men-val-3" name="men-1" min="0"  aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <span class="input-group-text" id="inpIkWh3">kwh</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label">4° Bimestre:</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" id="men-val-4" name="men-1" min="0"  aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <span class="input-group-text" id="inpIkWh4">kwh</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label">5° Bimestre:</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" id="men-val-5" name="men-1" min="0"  aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <span class="input-group-text" id="inpIkWh5">kwh</span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label">6° Bimestre:</label>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" id="men-val-6" name="men-1" min="0"  aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <span class="input-group-text" id="inpIkWh6">kwh</span>
                    </div>
                </div>
            </div> <!-- Fin de inputs sobre información de consumo bimestral del cliente -->

            <!-- Inicio div de contención del botón "Extarer" -->
            <div class="col-md-2 d-flex justify-content-end">
                <button class="btn btn-azul2 btn-estandar" type="button" id="button-addon2"><i
                        class="uil uil-upload"></i> Extraer datos
                </button>
            </div>
            <!-- Fin div de contención del botón de "Extarer" -->

            <!-- Inicio div de contención del botón "Calcular" -->
            <div class="col-md-10 d-flex justify-content-end mt-2">
                <button class="btn btn-azul2 btn-estandar" type="button" id="button-addon2" onclick="calcularPropuestaBT(this);"><i class="uil uil-calculator"></i> Calcular</button>
            </div>
            <!-- Fin div de contención del botón de "Calcular" -->

        </div>
    </div> <!-- Finaliza apartado de datos de consumo -->
    <div class="container-fluid card-section my-3"> <!-- Inicia apartado de cotización -->
        <div class="row pb-3 g-3">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                <h6>Cotizaci&oacute;n</h6>
            </div>
            <div class="col-md-6 card-section-alt p-2">
                <!-- Div del apartado izquierdo de cotización "Combinaciones" -->
                <div class="row"> <!-- Inicia selección de compinaciones predeterminadas-->
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap">
                        <p><i class="uil uil-abacus"></i> Combinaciones</p>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Combinaciones predeterminadas</label>
                            <select class="form-select" id="ddlCombinaciones" onchange="seleccionarCombinacion(this)">
                                <option selected>Elige una combinación</option>
                                <option value="combinacionOptima">Premium</option>
                                <option value="combinacionMediana">Recomendada</option>
                                <option value="combinacionEconomica">Económica</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div><!-- Fin div del apartado izquierdo de cotización "Combinaciones" -->

            <div class="col-md-6 card-section-alt p-2"> <!-- Div del apartado derecho de cotización "Equipos" -->
                <div class="row">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap">
                        <p><i class="uil uil-abacus"></i> Equipos</p>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md">
                        <label class="form-label">Combinación personalizada</label>
                        <div class="container-fluid">
                            <div class="row">
                                <!-- Div contención de los 2 select izquierdos del apartado de cotización "Equipos" -->
                                <div class="col-lg-6 col-md-6"> <!-- Select "Panel" -->
                                    <select  id="listPaneles" class="form-select" onchange="mostrarPanelSeleccionado()">
                                        <option selected>Elige un panel</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6"> <!-- Select "Marca de invesor" -->
                                    <select  id="listInversores" class="form-select" onchange="mostrarInversorSeleccionado()">
                                        <option selected>Elige una marca de inversor</option>
                                    </select>
                                </div>

                            </div>
                            <!-- Fin div contención de los 2 select izquierdos del apartado de cotización "Equipos" -->

                            <div class="row">
                                <!-- Div contención de los 2 select derechos del apartado de cotización "Equipos" -->
                                <div class="col-lg-6 col-md-6 mt-2"><!-- Select "Estructura" -->
                                    <select  id="listEstructura" class="form-select" onchange="cambiarEstructura()">
                                        <option selected>Elige una estructura</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 col-md-6 mt-2"><!-- Select "Modelo de invesor" -->
                                    <select id="listModelosInversor" class="form-select" onchange="mostrarInversorModeloSeleccionado()">
                                        <option selected>Elige un modelo de inversor</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Fin div contención de los 2 select derechos del apartado de cotización "Equipos" -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Inicia apartado de "Propuesta"-->
        <div class="row mt-1">
            <div>
                <div class="row"> <!-- Div contención de los botones del apartado de cotización-->
                    <!-- Inicia div de contención del botón de "Ajustes" -->
                    <div class="col-sm-4 d-flex justify-content-center mt-2" id="divbtnAjustes">
                        <div class="row">
                            <button class="btn btn-azul2 btn-estandar" type="button" id="button-addon2"
                                    data-bs-toggle="modal" data-bs-target="#modalAjustes"><i
                                    class="uil uil-setting"></i> Ajustes
                            </button>
                        </div>
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
                                            <label>Porcentaje de generación </label>
                                            <input id="inpSliderPropuesta" type="range" min="0" max="200"  class="form-range" value="0" oninput="rangeValuePropuesta.value=inpSliderPropuesta.value" onchange="sliderModificarPropuesta()">
                                            <output id="rangeValuePropuesta"></output>%
                                        </div>
                                        <div>
                                            <label>Descuento que desee aplicar </label>
                                            <input id="inpSliderDescuento" type="range" min="0" max="30" class="form-range" value="0" oninput="rangeValueDescuento.value=inpSliderDescuento.value" onchange="sliderModificarPropuesta()">
                                            <output id="rangeValueDescuento"></output>%
                                        </div>
                                        <div>
                                            <label>Aumento en el costo del proyecto </label>
                                            <input id="inpSliderAumento" type="range" min="0" max="100" class="form-range" value="0" oninput="rangeValueAumento.value=inpSliderAumento.value">
                                            <output id="rangeValueAumento"></output>%
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onclick="modificarPropuesta()"><i class="uil uil-check-circle"></i> Modificar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Finaliza div de contención del botón de "Ajustes" -->

                    <!-- Inicia div de contención del botón de "Agregados" -->
                    <div class="col-sm-4 d-flex justify-content-center mt-2" id="divbtnAgregados">
                        <div class="row">
                            <!-- Botón "Agregados" -->
                            <button class="btn btn-azul2 btn-estandar" type="button" id="btnAgregadosBaja"
                                    title="Agregados" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="uil uil-plus-circle"></i> Agregados
                            </button>
                        </div>
                        <!-- Inicia div de contención del modal de "Agregados" -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- Inicio de la parte superior del modal de "Agregados" -->
                                        <h5 class="modal-title">Agregados</h5>
                                        <!-- Label del "Costo total" del modal "Agregados" -->
                                        <div class="row pb-2 g-2">
                                            <div class="col">
                                                <form class="form-inline">
                                                    <div class="row">
                                                        <!-- Costo total -->
                                                        <div class="form-group col-sm-10 mt-4">
                                                            <label for="costoTotalAgregados">Costo total: </label>
                                                            <p id="costoTotalAgregados"
                                                               class="bg-warning text-white"></p>
                                                        </div>
                                                        <!-- Botón "Calcular" -->
                                                        <div class="form-group col-sm-2 mt-2">
                                                            <button type="button" class="btn btn-success"  onclick="calcularAgregados()"><i
                                                                    class="uil uil-calculator"></i>Calcular
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Botón "Cerrar" del modal "Agregados" -->
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                                                aria-label="Close"><i class="uil uil-multiply"></i></button>
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

                    <!-- Inicio div de contención del botón de "Generar" -->
                    <div class="col-sm-4 d-flex justify-content-center mt-2" id="divbtnGenerarEquipos">
                        <button class="btn btn-azul2 btn-estandar" type="button" id="button-addon2" onclick="generarEntregable()"><i class="uil uil-import"></i> Generar PDF</button>
                    </div>
                    <!-- Fin div de contención del botón de "Generar" -->

                </div>
            </div>

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

    </div>

    <!-- Inicia el apartado de "Resultados" -->
    <div class="container-fluid card-section mt-3">
        <div class="row pb-1 g-1">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap mt-2">
                <p> Resultados</p>
            </div>
            <!-- Inicia carta de presentación de resultados -->
            <div class="col-md-12 card-section">
                <div class="row justify-content-center flex-row ">

                    <div class="row">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap mt-2">
                            <p><i class="uil uil-bill"></i> Cotización</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <!-- Tabla de cotización -->
                        <div class="col m-3" id="divTablasCot">
                            <div>
                                <table class="table table-hover">
                                    <thead class="celda-azul">
                                    <th colspan="2" class="font-white">POTENCIA <i class="uil uil-bolt-alt"></i></th>
                                    </thead>
                                    <tr>
                                        <td>Potencia instalada</td>
                                        <td id="tdPanelPotenciaReal"></td>
                                    </tr>
                                    <tr>
                                        <td>Costo por watt</td>
                                        <td id="tdCostoWatt"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Tabla de Panel -->
                        <div class="col m-3" id="divTablasPanel">
                            <div>
                                <table class="table table-hover">
                                    <thead class="celda-azul">
                                    <th colspan="2" class="font-white">PANEL <i class="uil uil-cell"></i></th>
                                    </thead>
                                    <tr>
                                        <td>Modelo</td>
                                        <td id="tdPanelModelo"></td>
                                    </tr>
                                    <tr>
                                        <td>Potencia</td>
                                        <td id="tdPanelPotencia"></td>
                                    </tr>
                                    <tr>
                                        <td>Cantidad</td>
                                        <td id="tdPanelCantidad"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Tabla de Inversor -->
                        <div class="col m-3" id="divTablasInversor">
                            <div>
                                <table class="table table-hover">
                                    <thead class="celda-azul">
                                    <th colspan="2" class="font-white">INVERSOR <i class="uil uil-hdd"></i></th>
                                    </thead>
                                    <tr>
                                        <td>Modelo</td>
                                        <td id="tdInversorModelo"></td>
                                    </tr>
                                    <tr>
                                        <td>Potencia</td>
                                        <td id="tdInversorPotencia"></td>
                                    </tr>
                                    <tr>
                                        <td>Cantidad</td>
                                        <td id="tdInversorCantidad"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Tabla de Total -->
                        <div class="col m-3" id="divTablasTotal">
                            <div>
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
            </div>

            <div class="col-md-6 card-section mb-2">
                <div class="row justify-content-center flex-row ">
                    <div class="row">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap mt-3">
                            <p><i class="uil uil-bolt-alt"></i> Energía</p>
                        </div>

                        <div class="d-flex align-items-center">
                            <div id="divChartEnergetico" style="height:40vh; width:40vw;">
                                <canvas id="chartEnergetico"></canvas>
                            </div>
                        </div>

                        <div class="d-flex graficosCenter">
                            <div class="d-flex flex-row">
                                <table class="table tablaEnergia table-responsive">

                                    <tr class="bordeBut">
                                        <th></th>
                                        <th colspan="3" class="celGris font-white ambosBordes">Consumo energético</th>
                                    </tr>

                                    <tr>
                                        <th></th>
                                        <th class="celNaranja font-white celdaPer ">Consumo s/paneles</th>
                                        <th class="celVerde font-white celdaPer">Generación</th>
                                        <th class="celRojo font-white celdaPer ">Consumo c/paneles</th>
                                    </tr>

                                    <tr>
                                        <td class="">Mensual</td>
                                        <td id="tdConsumoActualKwMes" class="tdAnsw celNaranja font-white"></td>
                                        <td id="tdGeneracionKwMes" class="tdAnsw celVerde font-white"></td>
                                        <td id="tdNuevoConsumoMes" class="tdAnsw celRojo font-white"></td>
                                    </tr>

                                    <tr>
                                        <td class="">Bimestral</td>
                                        <td id="tdConsumoActualKwBim" class="tdAnsw celNaranja font-white"></td>
                                        <td id="tdGeneracionKwBim" class="tdAnsw celVerde font-white"></td>
                                        <td id="tdNuevoConsumoBim" class="tdAnsw celRojo font-white"></td>
                                    </tr>

                                    <tr>
                                        <td class="">Tarifa</td>
                                        <td id="tdTarifaActual" class="tdAnsw celNaranja font-white"></td>
                                        <td id="tdPorcentajePropuesta" class="tdAnsw celVerde font-white"></td>
                                        <td id="tdTarifaNueva" class="tdAnsw celRojo font-white"></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 card-section mb-2">
                <div class="row justify-content-center flex-row ">
                    <div class="row">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap mt-3">
                            <p><i class="uil uil-signal-alt-3"></i> Ahorro</p>
                        </div>

                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <div id="divChartEconomico" style="height:40vh; width:40vw;">
                                    <canvas id="chartEconomico"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="graficosCenter tabla-container">
                            <div class="grid-container">
                                <table id="tableConsumosEnergeticos" class="table tablaEnergia table-responsive">
                                    <tr class="bordeBut">
                                        <th></th>
                                        <th colspan="3" class="celGris font-white ambosBordes">Consumo económico</th>
                                    </tr>

                                    <tr>
                                        <th></th>
                                        <th class="celNaranja font-white celdaPer ">Consumo s/paneles</th>
                                        <th class="celRojo font-white celdaPer ">Consumo c/paneles</th>
                                        <th class="celVerde font-white celdaPer">Ahorro</th>
                                    </tr>

                                    <tr>
                                        <td class="">Mensual</td>
                                        <td id="tdConsumoActualDinMes" class="tdAnsw celNaranja font-white"></td>
                                        <td id="tdNuevoConsumoDinMes" class="tdAnsw celRojo font-white"></td>
                                        <td id="tdAhorroDinMes" class="tdAnsw celVerde font-white"></td>
                                    </tr>

                                    <tr>
                                        <td class="">Bimestral</td>
                                        <td id="tdConsumoActualDinBim" class="tdAnsw celNaranja font-white"></td>
                                        <td id="tdNuevoConsumoDinBim" class="tdAnsw celRojo font-white"></td>
                                        <td id="tdAhorroDinBim" class="tdAnsw celVerde font-white"></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td class="celdaPer alineaDerecha">ROI</td>
                                        <th class="celdaPer">Bruto: <br> <label id="tdROIbruto"></label></th>
                                        <th class="celdaPer">Con deducción: <label id="tdROIdeduccion"></label></th>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Finaliza el apartado de cotización -->
@endsection
