@extends('cotizador.includes.app')
@section('window', 'Individual')
@section('current-content')
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
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Elige una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <div class="mt-2">
                        <label class="form-label">Ingrese la cantidad de paneles</label>
                        <input type="text" class="form-control" id="inputAddress" value="">
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Seleccione un inversor</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Elige una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <div class="mt-2">
                        <label class="form-label">Ingrese la cantidad de inversores</label>
                        <input type="text" class="form-control" id="inputAddress" value="">
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Seleccione una estructura</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Elige una opción</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <div class="mt-2">
                        <label class="form-label">Ingrese la cantidad de estructuras</label>
                        <input type="text" class="form-control" id="inputAddress" value="">
                    </div>
                </div>

            </div>
        </div>

        <!-- Div contención de los botones del apartado de cotización -->
        <div class="row d-flex justify-content-center text-center">

            <!-- Inicia div de contención del botón de "Ajustes" -->
            <div class="col mt-3" id="divbtnAjustes">
                <button class="btn btn-azul2 btn-estandar" type="button" id="button-addon2" data-bs-toggle="modal"
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
                                <button type="button" class="btn btn-success"><i class="uil uil-check-circle"></i>
                                    Modificar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Finaliza div de contención del botón de "Ajustes" -->

            <!-- Inicia div de contención del botón de "Agregados" -->
            <div class="col mt-3" id="divbtnAgregados">
                <!-- Botón "Agregados" -->
                <button class="btn btn-azul2 btn-estandar" type="button" id="btnAgregadosBaja" title="Agregados"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="uil uil-plus-circle"></i>
                    Agregados
                </button>
                <!-- Inicia div de contención del modal de "Agregados" -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
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
                                                    <button type="button" class="btn btn-success"><i
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
                                        <div class="col">
                                            <form class="form-inline">
                                                <div class="row">
                                                    <!-- Cantidad -->
                                                    <div class="form-group col-md-3">
                                                        <label for="inpCantidadAg">Cantidad</label>
                                                        <input id="inpCantidadAg" type="number"
                                                               class="form-control inpAg">
                                                    </div>
                                                    <!-- Concepto -->
                                                    <div class="form-group col-md-5">
                                                        <label for="inpAgregado">Concepto</label>
                                                        <input id="inpAgregado" type="text" class="form-control inpAg">
                                                    </div>
                                                    <!-- Precio -->
                                                    <div class="form-group col-md-2">
                                                        <label for="inpPrecioAg">Precio</label>
                                                        <input id="inpPrecioAg" type="number" min=".50" step="any"
                                                               class="form-control inpAg">
                                                    </div>
                                                    <!-- Botón "Nuevo agregado" -->
                                                    <div class="form-group col-md-2 mt-4">

                                                        <button id="btnAddAg" type="button" class="btn btn-primary"><i
                                                                class="uil uil-plus"></i></button>
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
            <div class="col mt-3" id="divbtnCalcular">
                <button class="btn btn-azul2 btn-estandar" type="button" id="button-addon2"><i
                        class="uil uil-calculator"></i> Calcular
                </button>
            </div>
            <!-- Fin div de contención del botón de "Generar" -->

            <!-- Inicio div de contención del botón de "Generar" -->
            <div class="col mt-3" id="divbtnGenerarEquipos">
                <button class="btn btn-azul2 btn-estandar" type="button" id="button-addon2"><i
                        class="uil uil-import"></i> Generar PDF
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
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckDefault">
                        ¿Desea que los subtotales se muestren desglozados?
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>
            </div>
        </div>

    </div>

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
                            <td>ejemplo 1</td>
                        </tr>
                        <tr>
                            <td>Costo por panel(es)</td>
                            <td>ejemplo 2</td>
                        </tr>
                        <tr>
                            <td>Costo por inversor(es)</td>
                            <td>ejemplo 3</td>
                        </tr>
                        <tr>
                            <td>Costo por estructura(s)</td>
                            <td>ejemplo 4</td>
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
                                <td>ejemplo 1</td>
                            </tr>
                            <tr>
                                <td>Costo de mano de obra y otros</td>
                                <td>ejemplo 2</td>
                            </tr>
                            <tr>
                                <td>Costo fletes</td>
                                <td>ejemplo 3</td>
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
    </div>
@endsection
