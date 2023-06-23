<div class="container-fluid card-section"> <!-- Inicia apartado de clientes (agregar y buscar) -->
    <div class="row">
        <div class="col-md-12 py-3">
            <div class="input-group">
                <!-- Apartado de buscar cliente-->
                <input type="text" id="buscarCliente" name="buscarCliente" class="form-control inp" placeholder="Ingrese el nombre del cliente a buscar">
                <button
                    class="btn btn-azul2" type="button" title="Buscar cliente" id="button-addon2" onclick="buscarCoincidenciaCliente(this)"><i class="uil uil-search"></i> Buscar</button>
                <button class="btn btn-verde" type="button" id="button-addon2" data-bs-toggle="collapse" data-bs-target="#collapseAgregarCliente" aria-expanded="false" aria-controls="collapseWidthExample"><i class="uil uil-user-plus"></i> Agregar nuevo cliente</button>
            </div>
        </div>
    </div>


</div>

<div class="mt-1">

    <div class="row mt-2">
        <div class="col-sm">
            <select id="ddlCoincidenciasCliente" class="form-control" style="display:none;" onchange="seleccionarCliente(this)">
                <option value="-1" selected>Elige un cliente</option>
            </select>
            <small id="txtNoHayCoincidencia" style="display:none;">No hay coincidencia</small>
        </div>
    </div>

    <div class="mt-2">
        <div class="collapse" id="collapseBuscarCliente">
            <div class="card card-body">
                <div class="row pb-3 g-3">
                    <!-- Inician campos -->
                    <div class="col-md-3" style="display:none;">
                        <input id="inpClienteId" name="inpClienteId" class="form-control datosCliente" placeholder="Id Cliente" readonly/>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>*</strong> Nombre:</label>
                        <input type="text" class="form-control" id="inpDetailsClienteNombre" name="inpDetailsClienteNombre" value="" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>*</strong> Primer apellido:</label>
                        <input type="text" class="form-control" id="inpDetailsCliente1erAp" name="inpDetailsCliente1erAp" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>*</strong> Segundo apellido:</label>
                        <input type="text" class="form-control" id="inpDetailsCliente2doAp" name="inpDetailsCliente2doAp" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Telef&oacute;no: </label>
                        <input type="text" class="form-control" id="inpDetailsClienteTel" name="inpDetailsClienteTel" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>*</strong> Telef&oacute;no celular:</label>
                        <input type="text" class="form-control" id="inpDetailsClienteCel" name="inpDetailsClienteCel" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Correo electr&oacute;nico:</label>
                        <input type="text" class="form-control" id="inpClienteMail" name="inpClienteMail" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>*</strong> Dirección (calle):</label>
                        <input type="text" class="form-control" id="inpDetailsClienteCalle" name="inpDetailsClienteCalle" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>*</strong> CP: </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="inpDetailsClienteCP" name="inpDetailsClienteCP" value="">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>*</strong> Ciudad:</label>
                        <input type="text" class="form-control" id="inpDetailsClienteCiud" name="inpDetailsClienteCiud" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>*</strong> Municipo:</label>
                        <input type="text" class="form-control" id="inpDetailsClienteMunic" name="inpDetailsClienteMunic" value="">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label"><strong>*</strong> Estado:</label>
                        <input type="text" class="form-control" id="inpDetailsClienteEstado" name="inpDetailsClienteEstado" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin del apartado de clientes -->

<div class="mt-1">
    <div>
        <div class="collapse" id="collapseAgregarCliente">
            <div class="card card-body">
                <div>
                    <div class="d-flex justify-content-between col-md-12 border-bottom py-2">
                        <!-- Botón de agregar cliente -->
                        <h6>Agregue la informaci&oacute;n general del cliente</h6>
                    </div>
                    <!-- Inician campos para agregar cliente o cargarlo -->
                    <form method="POST" action="{{ url('registrarCliente') }}">
                        @csrf
                        <div class="row pb-3 g-3">
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> Nombre:</label>
                                <input type="text" class="form-control" id="inpClienteNombre" name="inpClienteNombre" value="" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> Primer apellido:</label>
                                <input type="text" class="form-control" id="inpClientePrimerAp" name="inpClientePrimerAp" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> Segundo apellido:</label>
                                <input type="text" class="form-control" id="inpClienteSegundoAp" name="inpClienteSegundoAp" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Telef&oacute;no: </label>
                                <input type="text" class="form-control" id="inpClienteTelefono" name="inpClienteTelefono" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> Telef&oacute;no celular:</label>
                                <input type="text" class="form-control" id="inpClienteCelular" name="inpClienteCelular" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Correo electr&oacute;nico:</label>
                                <input type="text" class="form-control" id="inpClienteMail" name="inpClienteMail" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> Dirección (calle):</label>
                                <input type="text" class="form-control" id="inpClienteCalle" name="inpClienteCalle" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> CP: </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="inpCP" name="inpCP" value="">
                                    <button class="btn btn-azul2" type="button" id="btn-cp" name="btn-cp" onclick="CoindicenciasCP(this)"><i class="uil uil-search"></i></button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> Asentamiento:</label>
                                <select id="ddlColonia" class="form-select">
                                    <option>Escoja un asentamiento</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> Ciudad:</label>
                                <input type="text" class="form-control" id="inpClienteCiudad" name="inpClienteCiudad" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> Municipo:</label>
                                <input type="text" class="form-control" id="inpClienteMunicipio" name="inpClienteMunicipio" value="">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label"><strong>*</strong> Estado:</label>
                                <input type="text" class="form-control" id="inpClienteEstado" name="inpClienteEstado" value="">
                            </div>

                            <div class="col-md-3 mt-5">
                                <button type="submit" class="btn btn-gris" type="button" id="button-addon2"><i class="uil uil-save"></i> Guardar nuevo cliente</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin del apartado de clientes -->

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
    $("#ddlCoincidenciasCliente").change(function () {
        $("#ddlCoincidenciasCliente option:selected").each(function () {
            $('#collapseBuscarCliente').collapse("show");
        });
    });
</script>

