@extends('cotizador.includes.app')
@section('window', 'Baja Tension')
@section('current-content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="subtitle-window">Baja tensi&oacute;n</h3>
</div>

    @include('cotizador.pages.vendedor.clientes')

<div class="container-fluid card-section mt-3"> <!-- Inicia apartado de datos de consumo -->
    <div class="row pb-3 g-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
            <h6>Dato de consumo</h6>
        </div>
        <div class="col-md-6"> <!-- Apartado de selección de tarifa del cliente -->
            <label class="form-label">Tarifa actual:</label>
            <select class="form-select" aria-label="Default select example">
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
        <div class="col-md-6">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                <label class="form-check-label" for="flexSwitchCheckChecked">Generar promedio</label>
            </div>
        </div>
        <div class="col-md-2"> <!-- Inputs sobre información de consumo bimestral del cliente -->
            <label class="form-label">1° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="">
        </div>
        <div class="col-md-2">
            <label class="form-label">2° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="">
        </div>
        <div class="col-md-2">
            <label class="form-label">3° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="">
        </div>
        <div class="col-md-2">
            <label class="form-label">4° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="">
        </div>
        <div class="col-md-2">
            <label class="form-label">5° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="">
        </div>
        <div class="col-md-2">
            <label class="form-label">6° Bimestre:</label>
            <input type="text" class="form-control" id="inputAddress" value="">
        </div> <!-- Fin de inputs sobre información de consumo bimestral del cliente -->

        <div class="col-md-2 d-flex justify-content-end">
            <button class="btn btn-primary btn-estandar" type="button" id="button-addon2"><i class="uil uil-upload"></i> Extraer datos</button>
        </div>

        <div class="col-md-10 d-flex justify-content-end">
            <button class="btn btn-success btn-estandar" type="button" id="button-addon2"><i class="uil uil-calculator"></i> Calcular</button>
        </div>
    </div>
</div> <!-- Finaliza apartado de datos de consumo -->
<div class="container-fluid card-section my-3"> <!-- Inicia apartado de cotización -->
    <div class="row pb-3 g-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
            <h6>Cotizaci&oacute;n</h6>
        </div>
        <div class="col-md-6 card-section-alt p-2"> <!-- Div del apartado izquierdo de cotización "Combinaciones" -->
            <div class="row"> <!-- Inicia selección de compinaciones predeterminadas-->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap">
                    <p><i class="uil uil-abacus"></i> Combinaciones</p>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Combinaciones predeterminadas</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Elige una combinación</option>
                            <option value="1">Premium</option>
                            <option value="2">Recomendada</option>
                            <option value="3">Económica</option>
                        </select>
                    </div>
                </div>
                <div class="row"> <!-- Div de botón "Generar PDF de combinaciones predeterminadas" -->
                    <div class="col-md-12 d-flex justify-content-end mt-9">
                        <button class="btn btn-success btn-estandar" type="button" id="button-addon2"><i class="uil uil-import"></i> Generar</button>
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
                        <div class="row"> <!-- Div contención de los 2 select izquierdos del apartado de cotización "Equipos" -->
                            <div class="col-lg-6 col-md-6"> <!-- Select "Panel" -->
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Elige un panel</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-6"><!-- Select "Modelo de invesor" -->
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Elige un modelo de inversor</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div> <!-- Fin div contención de los 2 select izquierdos del apartado de cotización "Equipos" -->

                        <div class="row"> <!-- Div contención de los 2 select derechos del apartado de cotización "Equipos" -->
                            <div class="col-lg-6 col-md-6 mt-2"><!-- Select "Estructura" -->
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Elige una estructura</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>

                            <div class="col-lg-6 col-md-6 mt-2"> <!-- Select "Marca de invesor" -->
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Elige una marca de inversor</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div> <!-- Fin div contención de los 2 select derechos del apartado de cotización "Equipos" -->
                    </div>
                </div>
                <div class="row"> <!-- Div contención de los botones del apartado de cotización "Equipos" -->

                    <!-- Inicia div de contención del botón de "Ajustes" -->
                    <div class="col-md-4 d-flex justify-content-end mt-4" id="divbtnAjustes">
                        <div class="row">
                            <button class="btn btn-primary btn-estandar" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#modalAjustes"><i class="uil uil-setting"></i> Ajustes</button>
                        </div>
                        <div class="modal fade" id="modalAjustes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ajustes</h5>
                                            <!-- Botón "Cerrar" del modal "Agregados" -->
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
                                            <!-- Fin botón "Cerrar" del modal "Agregados" -->
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label>Porcentaje de generación </label>
                                                <input type="range" class="form-range" id="customRange1">
                                                <label> %</label>
                                            </div>
                                            <div>
                                                <label>Descuento que desee aplicar </label>
                                                <input type="range" class="form-range" id="customRange1">
                                                <label> % </label>
                                            </div>
                                            <div>
                                                <label>Aumento en el costo del proyecto </label>
                                                <input type="range" class="form-range" id="customRange1">
                                                <label> % </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"><i class="uil uil-check-circle"></i> Modificar</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Finaliza div de contención del botón de "Ajustes" -->

                    <!-- Inicia div de contención del botón de "Agregados" -->
                    <div class="col-md-4 d-flex justify-content-end mt-4" id="divbtnAgregados">
                        <div class="row">
                            <!-- Botón "Agregados" -->
                            <button class="btn btn-warning btn-estandar" type="button" id="btnAgregadosBaja" title="Agregados" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="uil uil-plus-circle"></i> Agregados</button>
                        </div>
                        <!-- Inicia div de contención del modal de "Agregados" -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header"> <!-- Inicio de la parte superior del modal de "Agregados" -->
                                        <h5 class="modal-title">Agregados</h5>
                                        <!-- Label del "Costo total" del modal "Agregados" -->
                                        <div class="row pb-2 g-2">
                                            <div class="col">
                                                <form class="form-inline">
                                                    <div class="row">
                                                        <!-- Costo total -->
                                                        <div class="form-group col-sm-10 mt-4">
                                                            <label for="costoTotalAgregados">Costo total: </label>
                                                            <p id="costoTotalAgregados" class="bg-warning text-white"></p>
                                                        </div>
                                                        <!-- Botón "Calcular" -->
                                                        <div class="form-group col-sm-2 mt-2">
                                                            <button type="button" class="btn btn-success"><i class="uil uil-calculator"></i>Calcular</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Botón "Cerrar" del modal "Agregados" -->
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"><i class="uil uil-multiply"></i></button>
                                        <!-- Fin botón "Cerrar" del modal "Agregados" -->
                                    </div> <!-- Fin de la parte superior del modal de "Agregados" -->
                                    <div class="modal-body"> <!-- Inicio del cuepro del modal de "Agregados" -->
                                        <div class="container-fluid">
                                            <div class="row pb-3 g-3">
                                                <!-- Inicio campos para generar un nuevo "Agregado" -->
                                                <div class="col">
                                                    <form class="form-inline">
                                                        <div class="row">
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
                                                            <div class="form-group col-md-2">
                                                                <label for="inpPrecioAg">Precio</label>
                                                                <input id="inpPrecioAg" type="number" min=".50" step="any" class="form-control inpAg">
                                                            </div>
                                                            <!-- Botón "Nuevo agregado" -->
                                                            <div class="form-group col-md-2 mt-4">

                                                                <button id="btnAddAg" type="button" class="btn btn-primary"><i class="uil uil-plus"></i></button>
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
                    <div class="col-md-4 d-flex justify-content-end mt-4" id="divbtnGenerarEquipos">
                        <button class="btn btn-success btn-estandar" type="button" id="button-addon2"><i class="uil uil-import"></i> Generar</button>
                    </div>
                    <!-- Fin div de contención del botón de "Generar" -->
                </div>
            </div>
        </div>
    </div>

    <!-- Inicia apartado de "Propuesta" (configuración del pdf) -->
        <div class="row">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap">
                <p><i class="uil uil-setting"></i> Configuración del PDF</p>
                <!-- Botón de configuración del PDF -->
                    <div class="form-check">
                        <label class="form-check-label" for="flexCheckDefault">
                            ¿Desea que los subtotales se muestren desglozados?
                        </label>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
            </div>
        </div>

</div>

<!-- Inicia el apartado de "Resultados" -->
<div class="container-fluid card-section mt-3">
    <div class="row pb-1 g-1">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap mt-2">
            <p><i class="uil uil-graph-bar"></i> Resultados</p>
        </div>
        <!-- Inicia carta de presentación de resultados -->
        <div class="row justify-content-center flex-row ">
            <div class="d-flex align-items-start">
                <!-- Inicia contenedor de botones de la barra de navegación del apartado "Resultados" -->
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="color_boton_cot" id="v-pills-cotizacion-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-cotizacion" aria-selected="true">Cotización</button>
                    <button class="color_boton_cot" id="v-pills-energia-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-energia" aria-selected="false">Energía</button>
                    <button class="color_boton_cot" id="v-pills-ahorro-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-ahorro" aria-selected="false">Ahorro</button>
                </div>
                <!-- Finaliza contenedor de botones de la barra de navegación del apartado "Resultados" -->
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Vista del boton "Corización" -->
                    <div class="tab-pane fade show active d-flex" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-cotizacion-tab">
                        <!-- Tabla de cotización -->
                        <div class="col-3 m-3" id="divTablasCot">
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                    <th colspan="2" class="table-primary">POTENCIA <i class="uil uil-bolt-alt"></i></th>
                                    </thead>
                                    <tr>
                                        <td>Potencia instalada</td>
                                        <td>ejemplo 1</td>
                                    </tr>
                                    <tr>
                                        <td>Costo por watt</td>
                                        <td>ejemplo 2</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Tabla de Panel -->
                        <div class="col-3 m-3" id="divTablasPanel">
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                    <th colspan="2" class="table-primary">PANEL <i class="uil uil-cell"></i></th>
                                    </thead>
                                    <tr>
                                        <td>Modelo</td>
                                        <td>ejemplo 1</td>
                                    </tr>
                                    <tr>
                                        <td>Potencia</td>
                                        <td>ejemplo 2</td>
                                    </tr>
                                    <tr>
                                        <td>Cantidad</td>
                                        <td>ejemplo 3</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Tabla de Inversor -->
                        <div class="col-3 m-3" id="divTablasInversor">
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                    <th colspan="2" class="table-primary">INVERSOR <i class="uil uil-hdd"></i></th>
                                    </thead>
                                    <tr>
                                        <td>Modelo</td>
                                        <td>ejemplo 1</td>
                                    </tr>
                                    <tr>
                                        <td>Potencia</td>
                                        <td>ejemplo 2</td>
                                    </tr>
                                    <tr>
                                        <td>Cantidad</td>
                                        <td>ejemplo 3</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Tabla de Total -->
                        <div class="col-3 m-3" id="divTablasTotal">
                            <div>
                                <table class="table table-hover">
                                    <thead>
                                    <th class="table-primary">$</th>
                                    <th class="table-primary">TOTAL S/IVA</th>
                                    <th class="table-primary">TOTAL C/IVA</th>
                                    </thead>
                                    <tr>
                                        <td>USD</td>
                                        <td>ejemplo 1</td>
                                        <td>ejemplo 1.1</td>
                                    </tr>
                                    <tr>
                                        <td>MXN</td>
                                        <td>ejemplo 2</td>
                                        <td>ejemplo 2.2</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Vista del boton "Energía" -->
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-energia-tab">

                    </div>
                    <!-- Vista del boton "Ahorro" -->
                    <div class="tab-pane fade mb-3" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-ahorro-tab">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Finaliza el apartado de cotización -->
@endsection
