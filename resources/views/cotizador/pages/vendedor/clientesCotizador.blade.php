<div class="container-fluid card-section"> <!-- Inicia apartado de clientes (agregar y buscar) -->
    <div class="row">
        <div class="col-md-12 py-3">
            <div class="input-group">
                <!-- Apartado de buscar cliente-->
                <input type="text" class="form-control" placeholder="Ingrese el nombre del cliente a buscar" aria-label="" aria-describedby="button-addon2">
                <button class="btn btn-azul2" type="button" id="button-addon2"><i class="uil uil-search"></i> Buscar</button>
                <button class="btn btn-verde" type="button" id="button-addon2 " data-bs-toggle="collapse" data-bs-target="#collapseAgregarCliente" aria-expanded="false" aria-controls="collapseWidthExample"><i class="uil uil-user-plus"></i> Agregar nuevo cliente</button>
            </div>
        </div>
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
</div>
<!-- Fin del apartado de clientes -->

