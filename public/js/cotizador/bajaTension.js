$(document).ready(function(){
    sessionStorage.clear();
    sessionStorage.setItem("bndPropuestaEditada", 0);

    $('#ReciboCFEImage').on('click', function () {
        $('#urlpdf').click();
    });

    $('#urlpdf').on('change', function () {
        var form = $('#fileUploadForm')[0];
        var data = new FormData(form);
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: "POST",
            enctype: 'multipart/form-data',
            url: "/extractInfoCFE",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                try{
                    console.log(data);
                    const obj = JSON.parse(data);
                    if(obj.error==="") {
                        document.getElementById("men-val-1").value = Number(obj.Periodos["0"].kwh) + Number(obj.Periodos["11"].kwh);
                        document.getElementById("men-val-2").value = Number(obj.Periodos["1"].kwh) + Number(obj.Periodos["2"].kwh);
                        document.getElementById("men-val-3").value = Number(obj.Periodos["3"].kwh) + Number(obj.Periodos["4"].kwh);
                        document.getElementById("men-val-4").value = Number(obj.Periodos["5"].kwh) + Number(obj.Periodos["6"].kwh);
                        document.getElementById("men-val-5").value = Number(obj.Periodos["7"].kwh) + Number(obj.Periodos["8"].kwh);
                        document.getElementById("men-val-6").value = Number(obj.Periodos["9"].kwh) + Number(obj.Periodos["10"].kwh);
                    }else{
                        alert(data.error);
                    }
                }catch (e) {
                    alert(e.message);
                }
            },
            error: function (e) {
                console.log("ERROR : ", e);
            }
        });

    });
});

/*#region Datos*/
async function calcularPropuestaBT(e, dataEdite){ ///Main()
    sessionStorage.setItem("tarifaMT", null);
    let dataEdited = dataEdite || null;
    let data = null; //DATA de la propuesta a calcular

    //Se valida si la propuesta a realizar es una NUEVA o AJUSTADA(modificada)
    try{
        if(dataEdited === null){ //Cotizacio nueva
            //Se obtienen los datos de la propuesta
            let dataPropuesta = cacharDatosPropuesta();

            if(typeof dataPropuesta != "undefined"){
                data = dataPropuesta;
            }
            else{
                throw 'ERROR! La -data- de la Propuesta se encuentra vacia y es imposible cotizar';
            }

            /* Enviar Propuesta - Manipular resultado */
            //await pintarVistaDeResultados();

            _combinaciones = await obtenerCombinaciones(data);
            vaciarCombinacionesEnModal(_combinaciones); // :void()

            //Se obtienen paneles
            _cotizacion = await enviarCotizacion(data);
            vaciarRespuestaPaneles(_cotizacion);

            //Se obtiene estructuras
            let estructuras = await getListEstructuras();
            llenarDropDownListEstructuras(estructuras.message);
            //El sistema selecciona una estructura
            seleccionaUnaEstructura('Everest');
        }
        else{ //Cotizacion ajustada
            dataPropuesta = cacharDatosPropuesta();
            dataPropuesta.porcentajePropuesta = dataEdited.porcentajePropuesta;
            dataPropuesta.porcentajeDescuento = dataEdited.porcentajeDescuento;
            data = dataPropuesta;

            console.log("Data editada");
            console.log(data);

            ///Modificar las combinaciones
            _combinaciones = await obtenerCombinaciones(data);
            vaciarCombinacionesEnModal(_combinaciones); // :void()

            ///Enviar propuesta AJUSTADA
            _cotizacionAjustada = await enviarCotizacion(data);
            vaciarRespuestaPaneles(_cotizacionAjustada);

        }
    }
    catch(error){
        console.log(error);
        alert(error);
    }
}

/*function pintarVistaDeResultados(){
    new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'GET',
            url: '/resultados',
            success: resultView => {
                resolve(resultView);
            },
            error: error => {
                error = 'Al parecer hubo un error al intentar cargar vista de resultados';
                reject(error);
            }
        })
            .then(vistaResultados => {
                $('#divCotizacionBajaTension').css("display","none");
                $('#divBtnCalcularBT').css("display","none");
                $('#divResultCotizacionBT').css("display","");
                $('#divResult_bt').html(vistaResultados);
            })
            .catch(error => {
                alert(error);
            });
    });
}*/

async function calcularAgregados(){
    let ResultViaticos = {};

    try{
        let tipoCotizacion = sessionStorage.getItem('tarifaMT');

        //Se realiza nuevamente la propuesta
        if(tipoCotizacion === "null" || typeof tipoCotizacion === 'undefined'){ ///BajaTension
            ResultViaticos = await calcularViaticosBT();
        }
        else{ ///MediaTension
            // ResultViaticos = await calcularPropuestaMT(dataPorcentajes);
        }

        mostrarRespuestaViaticos(ResultViaticos);
    }
    catch(error){
        alert(error);
    }
}

/*#region Logica*/
function cacharDatosPropuesta(){
    let banderaDelError = 0; //Bandera para validar si en algun proceso hubo un error
    let idCliente = $('#inpClienteId').val();
    let tarifaSeleccionada = '';

    let _consumosBimestres = () => {
        __consumosBimestres = [];

        for(var i=0; i<6; i++)
        {
            consumos = $('#men-val-'+(i+1).toString()).val() || null;

            if(validarPeriodoVacio(consumos) === true){
                __consumosBimestres[i] = consumos;
            }
            else{
                banderaDelError = 1;
                break;
            }
        }

        return __consumosBimestres;
    };
    let direccionCliente = () => {
        let calle = $('#inpDetailsClienteCalle').val() || '';
        let asentamiento = $('#inpDetailsClienteMunic').val() || '';
        let ciudad = $('#inpDetailsClienteCiud').val() || '';
        let codigoPostal = $('#inpDetailsClienteCP').val() || '';
        let estado = $('#inpDetailsClienteEstado').val() || '';

        if(estado.length>0){
            return calle + ' ' + asentamiento + ' ' + ciudad + ' ' + codigoPostal + ' ' + estado;
        }
        else{
            banderaDelError = 1;
            alert('Falta cargar un cliente!');
        }
    };

    //
    direccionCliente = direccionCliente();

    //
    let tipoCotizacion = sessionStorage.getItem('tarifaMT');

    ///
    if(tipoCotizacion === "null" || typeof tipoCotizacion === 'undefined'){ ///BajaTension
        _consumosBimestres = _consumosBimestres();
        tarifaSeleccionada = $('#tarifa-actual').val();
    }
    else{ ///MediaTension
        _consumosBimestres = JSON.parse(sessionStorage.getItem("_periodosMT"));
        tarifaSeleccionada = tipoCotizacion;
    }

    //Si no hay error se forma y retorna la [data]
    if(banderaDelError !== 1){
        datosPropuesta = {
            idCliente: idCliente,
            consumos: _consumosBimestres,
            tarifa: tarifaSeleccionada,
            direccionCliente: direccionCliente,
            porcentajePropuesta: 0,
            porcentajeDescuento: 0
        };

        return datosPropuesta;
    }

    return undefined;
}

function obtenerCombinaciones(data){
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/askCombinations',
            data: data,
            dataType: 'json',
            success: function(result){
                if(result.status === 200){
                    //Guardar en un SessionStorage el -ArrayCombinaciones-
                    sessionStorage.removeItem("arrayCombinaciones");
                    sessionStorage.setItem("arrayCombinaciones", JSON.stringify(result.message));

                    //\\
                    console.log('Combinaciones:');
                    console.log(result.message);

                    resolve(result.message);
                }
                else{
                    console.log(result.message);
                    reject('Ah ocurrido un problema con la solicitud de -combinaciones-:\n'+result.message);
                }
            },
            error: function(error){
                console.log(error);
                reject('Ah ocurrido un problema con la solicitud de -combinaciones-:\n'+error);
            }
        });
    });
}

function vaciarCombinacionesEnModal(combinaciones){
    combinaciones = combinaciones[0];//Formating

    let CombinacionA = combinaciones.combinacionEconomica.combinacion; //CombinacionEconomica
    Object.assign(CombinacionA,{ tipoCombinacion: combinaciones.combinacionEconomica.nombre });

    let CombinacionB = combinaciones.combinacionMediana.combinacion; //CombinacionMediana
    Object.assign(CombinacionB,{ tipoCombinacion: combinaciones.combinacionMediana.nombre });

    let CombinacionC = combinaciones.combinacionOptima.combinacion; //CombinacionOptima
    Object.assign(CombinacionC,{ tipoCombinacion: combinaciones.combinacionOptima.nombre });

    /* CombinacionA */
    ///Title
    $('#titleCombinacionA').text(CombinacionA.tipoCombinacion);
    ///ImagenesLogos
    $('#imgPanelA').prop("src","../img/equipos/logos/panel/" + CombinacionA.paneles.vMarca + '.png');
    $('#imgInversorA').prop("src","../img/equipos/logos/inversor/" + CombinacionA.inversores.vMarca + '.jpg');
    $('#imgEstructuraA').prop("src","../img/equipos/logos/estructura/" + CombinacionA.estructura._estructuras.vMarca + '.png');
    ///CostoWatt
    $('#tdCostoWattA').text('$ '+CombinacionA.totales.precio_watt+' USD');
    ///Potencia instalada
    $('#tdPotenciaInstaladaA').text(CombinacionA.paneles.potenciaReal + ' Kw');
    ///Porcentaje Generacion
    $('#tdPorcentajePropuestaA').text(CombinacionA.power.porcentajePotencia + ' %');
    ///Panel
    $('#tdModeloPanelA').text(CombinacionA.paneles.nombre);
    $('#tdCantidadPanelA').text(CombinacionA.paneles.noModulos);
    $('#tdPotenciaPanelA').text(CombinacionA.paneles.fPotencia + ' W');
    ///Inversor
    $('#tdModeloInversorA').text(CombinacionA.inversores.vNombreMaterialFot);
    $('#tdCantidadInversorA').text(CombinacionA.inversores.numeroDeInversores);
    $('#tdPotenciaInversorA').text(CombinacionA.inversores.fPotencia + ' W');
    ///Estructura
    $('#tdModeloEstructuraA').text(CombinacionA.estructura._estructuras.vNombreMaterialFot);
    $('#tdCantidadEstructuraA').text(CombinacionA.estructura.cantidad);
    ///Ahorro [energetico && economico]
    $('#tdAhorroEnergeticoA').text(CombinacionA.power.Ahorro.ahorroBimestral.toLocaleString('es-MX') + ' Kw/bim');
    $('#tdAhorroEconomicoA').text('$' + CombinacionA.roi.ahorro.ahorroBimestralEnPesosMXN.toLocaleString('es-MX') + ' MXN');
    ///Subtotales&&Totales
    $('#tdSubtotalA').text('$ ' + CombinacionA.totales.precio.toLocaleString('es-MX') + ' USD');
    $('#tdTotalA').text('$ ' + CombinacionA.totales.precioMasIVA.toLocaleString('es-MX') + ' USD');

    /* CombinacionB */
    ///Title
    $('#titleCombinacionB').text(CombinacionB.tipoCombinacion);
    ///ImagenesLogos
    $('#imgPanelB').prop("src","../img/equipos/logos/panel/" + CombinacionB.paneles.vMarca + '.png');
    $('#imgInversorB').prop("src","../img/equipos/logos/inversor/" + CombinacionB.inversores.vMarca + '.jpg');
    $('#imgEstructuraB').prop("src","../img/equipos/logos/estructura/" + CombinacionB.estructura._estructuras.vMarca + '.png');
    ///CostoWatt
    $('#tdCostoWattB').text('$ ' + CombinacionB.totales.precio_watt + ' USD');
    $('#tdPotenciaInstaladaB').text(CombinacionB.paneles.potenciaReal + ' Kw');
    ///Panel
    $('#tdModeloPanelB').text(CombinacionB.paneles.nombre);
    $('#tdCantidadPanelB').text(CombinacionB.paneles.noModulos);
    ///Potencia instalada
    $('#tdPotenciaPanelB').text(CombinacionB.paneles.fPotencia + ' W');
    ///Porcentaje Generacion
    $('#tdPorcentajePropuestaB').text(CombinacionB.power.porcentajePotencia + ' %');
    ///Inversor
    $('#tdModeloInversorB').text(CombinacionB.inversores.vNombreMaterialFot);
    $('#tdCantidadInversorB').text(CombinacionB.inversores.numeroDeInversores);
    $('#tdPotenciaInversorB').text(CombinacionB.inversores.fPotencia + ' W');
    ///Estructura
    $('#tdModeloEstructuraB').text(CombinacionB.estructura._estructuras.vNombreMaterialFot);
    $('#tdCantidadEstructuraB').text(CombinacionB.estructura.cantidad);
    ///Ahorro [energetico && economico]
    $('#tdAhorroEnergeticoB').text(CombinacionB.power.Ahorro.ahorroBimestral.toLocaleString('es-MX') + ' Kw/bim');
    $('#tdAhorroEconomicoB').text('$' + CombinacionB.roi.ahorro.ahorroBimestralEnPesosMXN.toLocaleString('es-MX') + ' MXN');
    ///Subtotales&&Totales
    $('#tdSubtotalB').text('$ ' + CombinacionB.totales.precio.toLocaleString('es-MX') + ' USD');
    $('#tdTotalB').text('$ ' + CombinacionB.totales.precioMasIVA.toLocaleString('es-MX') + ' USD');

    /* CombinacionC */
    ///Title
    $('#titleCombinacionC').text(CombinacionC.tipoCombinacion);
    ///ImagenesLogos
    $('#imgPanelC').prop("src","../img/equipos/logos/panel/" + CombinacionC.paneles.vMarca + '.png');
    $('#imgInversorC').prop("src","../img/equipos/logos/inversor/" + CombinacionC.inversores.vMarca + '.jpg');
    $('#imgEstructuraC').prop("src","../img/equipos/logos/estructura/" + CombinacionC.estructura._estructuras.vMarca + '.png');
    ///CostoWatt
    $('#tdCostoWattC').text('$ ' + CombinacionC.totales.precio_watt+' USD');
    ///Potencia instalada
    $('#tdPotenciaInstaladaC').text(CombinacionC.paneles.potenciaReal + ' Kw');
    ///Porcentaje Generacion
    $('#tdPorcentajePropuestaC').text(CombinacionC.power.porcentajePotencia + ' %');
    ///Panel
    $('#tdModeloPanelC').text(CombinacionC.paneles.nombre);
    $('#tdCantidadPanelC').text(CombinacionC.paneles.noModulos);
    $('#tdPotenciaPanelC').text(CombinacionC.paneles.fPotencia + ' W');
    ///Inversor
    $('#tdModeloInversorC').text(CombinacionC.inversores.vNombreMaterialFot);
    $('#tdCantidadInversorC').text(CombinacionC.inversores.numeroDeInversores);
    $('#tdPotenciaInversorC').text(CombinacionC.inversores.fPotencia + ' W');
    ///Estructura
    $('#tdModeloEstructuraC').text(CombinacionC.estructura._estructuras.vNombreMaterialFot);
    $('#tdCantidadEstructuraC').text(CombinacionC.estructura.cantidad);
    ///Ahorro [energetico && economico]
    $('#tdAhorroEnergeticoC').text(CombinacionC.power.Ahorro.ahorroBimestral.toLocaleString('es-MX') + ' Kw/bim');
    $('#tdAhorroEconomicoC').text('$' + CombinacionC.roi.ahorro.ahorroBimestralEnPesosMXN.toLocaleString('es-MX') + ' MXN');
    ///Subtotales&&Totales
    $('#tdSubtotalC').text('$ ' + CombinacionC.totales.precio.toLocaleString('es-MX') + ' USD');
    $('#tdTotalC').text('$ ' + CombinacionC.totales.precioMasIVA.toLocaleString('es-MX') + ' USD');
}

function enviarCotizacion(data){ //Paneles
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/sendPeriodsBT',
            data: data,
            dataType: 'json',
            success: function(respuesta){
                if(respuesta.status === '500'){
                    reject('Error al intentar ejecutar su propuesta!');
                }
                else{
                    //#region Formating
                    respuesta = respuesta.message;
                    ////#endregion

                    //Consumos - Result [Formated]
                    sessionStorage.removeItem("_consumsFormated");
                    sessionStorage.setItem("_consumsFormated",JSON.stringify(respuesta[0]));

                    //Paneles - Result [Formated]
                    sessionStorage.removeItem("_respPaneles");
                    sessionStorage.setItem("_respPaneles",JSON.stringify(respuesta));

                    resolve(respuesta);
                }
            },
            error: function(){
                reject('Al parecer hubo un error con la peticion AJAX de la cotizacion BajaTension');
            }
        });
    });
}

function vaciarRespuestaPaneles(resultPaneles){
    let dropDownListPaneles = $('#listPaneles');

    //Valida que la coleccion de paneles no venga vacia
    if(resultPaneles.length > 0){
        //Limpiar dropdownlist
        limpiarDropDownListPaneles();

        //DropDownList-Paneles
        for(let i=1; i<resultPaneles.length; i++)
        {
            dropDownListPaneles.append(
                $('<option/>', {
                    value: i,
                    text: resultPaneles[i].panel.nombre
                })
            );
        }

        //Habilita lista de paneles
        dropDownListPaneles.prop("disabled", false);
    }
    else{
        alert('Error! Coleccion de paneles vacia');
    }
}

function getListEstructuras(){
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'GET',
            url: '/estructuras',
            dataType: 'json',
            success: function(respuesta){
                if(respuesta.status === '500'){
                    reject('Error al intentar consultar estructuras!');
                    console.log('Error estructuras:');
                    console.log(respuesta.message);
                }
                else{
                    resolve(respuesta);
                }
            },
            error: function(error){
                alert('Hubo un error al consultar las estructuras');
                console.log('Error estructuras:\n'+error);
            }
        });
    });
}

function llenarDropDownListEstructuras(estructuras){
    let listEstructuras = $('#listEstructura');

    limpiarDropDownListEstructuras();

    for(let i=0; i<estructuras.length; i++)
    {
        listEstructuras.append(
            $('<option/>', {
                value: estructuras[i].vMarca,
                text: estructuras[i].vMarca
            })
        );
    }

    listEstructuras.attr("disabled", false);
}

function seleccionaUnaEstructura(vMarcaSelected){
    $('#listEstructura option[value="'+vMarcaSelected+'"]').attr("selected", true);
}
/*---------------------------------*/

function getDataCombinacionesFiltrada(_Combinaciones){
    /* Optimiza los nodos de la data de combinaciones. Eliminando todo lo innecesario y asi aligerando
       en tamaño y volumen la data.
    */
    ///Cachar el nombre de la [combinacionSalvada]
    let nameCombinSalvada = $('#ddlCombinaciones').val();

    //Propuesta seleccionada
    let dataFiltrada = { propuesta: _Combinaciones[nameCombinSalvada].combinacion, propuestaSeleccionada: nameCombinSalvada };

    //Se *Settea* la data de -Cliente- && -Vendedor- al objeto Propuesta
    dataFiltrada.propuesta.cliente = _Combinaciones.cliente;
    dataFiltrada.propuesta.vendedor = _Combinaciones.vendedor;

    //Iterar toda la data para extraer las combinaciones *DISTINTAS* a la que fue seleccionada
    $.each(_Combinaciones, (iteracion, Combinacion) => {
        //Validar que son array (Solo las combinaciones *son Array*)
        if(Combinacion.combinacion){
            //Filtrar las demas combinaciones, *menos la "salvada" / seleccionada*
            //Tratar la data[combinacion] y retornar la data solo con las propiedades necesarias/filtrada
            let dataTratada = {
                paneles: {
                    potenciaReal: Combinacion.combinacion.paneles.potenciaReal,
                    nombre: Combinacion.combinacion.paneles.nombre,
                    noModulos: Combinacion.combinacion.paneles.noModulos,
                    potencia: Combinacion.combinacion.paneles.potencia,
                    marca: Combinacion.combinacion.paneles.vMarca,
                    origen: Combinacion.combinacion.paneles.origen
                },
                inversores: {
                    vNombreMaterialFot: Combinacion.combinacion.inversores.vNombreMaterialFot,
                    numeroDeInversores: Combinacion.combinacion.inversores.numeroDeInversores,
                    fPotencia: Combinacion.combinacion.inversores.fPotencia,
                    marca: Combinacion.combinacion.inversores.vMarca,
                    origen: Combinacion.combinacion.inversores.vOrigen
                },
                estructura: {
                    cantidad: Combinacion.combinacion.estructura.cantidad,
                    marca: Combinacion.combinacion.estructura._estructuras.vMarca,
                    costoTotal: Combinacion.combinacion.estructura.costoTotal,
                    origen: Combinacion.combinacion.estructura._estructuras.vOrigen
                },
                power: {
                    porcentajePotencia: Combinacion.combinacion.power.porcentajePotencia,
                    Ahorro: { ahorroBimestral: Combinacion.combinacion.power.Ahorro.ahorroBimestral },
                    nuevosConsumos: {
                        promedioNuevoConsumoBimestral: Combinacion.combinacion.power.nuevosConsumos.promedioNuevoConsumoBimestral
                    },
                    objGeneracionEnpesos: {
                        pagoPromedioBimestral: Combinacion.combinacion.power.objGeneracionEnpesos.pagoPromedioBimestral,
                        pagoPromedioBimestralConIva: Combinacion.combinacion.power.objGeneracionEnpesos.pagoPromedioBimestralConIva
                    }
                },
                roi: {
                    ahorro: { ahorroBimestralEnPesosMXN: Combinacion.combinacion.roi.ahorro.ahorroBimestralEnPesosMXN }
                },
                descuento: Combinacion.combinacion.descuento,
                totales: {
                    precio_watt: Combinacion.combinacion.totales.precio_watt,
                    precio: Combinacion.combinacion.totales.precio,
                    precioMasIVA: Combinacion.combinacion.totales.precioMasIVA
                }
            };

            //Se mezcla *dataTratada* -To- *dataFiltrada*
            Object.defineProperty(dataFiltrada, iteracion, {
                enumerable: true,
                value: dataTratada
            });
        }
    });

    return dataFiltrada;
}

function validarPeriodoVacio(periodo){
    if(periodo != null){
        return true;
    }
    else{
        alert('Periodos incompletos');
    }
}

/*#region Combinaciones*/
function seleccionarCombinacion(ddlCombinaciones){
    let _combinaciones = JSON.parse(sessionStorage.getItem("arrayCombinaciones"));
    _combinaciones = _combinaciones[0];
    console.log(_combinaciones);

    if(ddlCombinaciones.value !== -1 && _combinaciones !== null){
        let ddlCombinacionesValor = ddlCombinaciones.value;
        console.log(ddlCombinacionesValor);

        //Llenado de celdas de *RESULTADOS*
        /* PotenciaInstalada / CostoPorWatt  */
        $('#tdPanelPotenciaReal').text(_combinaciones[ddlCombinacionesValor].combinacion.paneles.potenciaReal + ' Kw');
        $('#tdCostoWatt').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.totales.precio_watt + ' USD');

        /* Tarifas */
        $('#tdTarifaActual').text(_combinaciones[ddlCombinacionesValor].combinacion.power.old_dac_o_nodac);
        $('#tdTarifaNueva').text(_combinaciones[ddlCombinacionesValor].combinacion.power.new_dac_o_nodac);

        /* % Generacion */
        $('#tdPorcentajePropuesta').text(_combinaciones[ddlCombinacionesValor].combinacion.power.porcentajePotencia + ' %');
        /* ROI */
        $('#tdROIbruto').text(_combinaciones[ddlCombinacionesValor].combinacion.roi.roiEnAnios + ' años');
        $('#tdROIdeduccion').text(_combinaciones[ddlCombinacionesValor].combinacion.roi.roiConDeduccion + ' años');

        /* Panel */
        $('#tdPanelModelo').text(_combinaciones[ddlCombinacionesValor].combinacion.paneles.nombre);
        $('#tdPanelPotencia').text(_combinaciones[ddlCombinacionesValor].combinacion.paneles.fPotencia + ' W');
        $('#tdPanelCantidad').text(_combinaciones[ddlCombinacionesValor].combinacion.paneles.noModulos);

        /* Inversor */
        $('#tdInversorModelo').text(_combinaciones[ddlCombinacionesValor].combinacion.inversores.vNombreMaterialFot);
        $('#tdInversorPotencia').text(_combinaciones[ddlCombinacionesValor].combinacion.inversores.fPotencia + ' W');
        $('#tdInversorCantidad').text(_combinaciones[ddlCombinacionesValor].combinacion.inversores.numeroDeInversores);

        /* [AhorroEnergetico] */
        //ConsumoActual
        $('#tdConsumoActualKwMes').text(_combinaciones[ddlCombinacionesValor].combinacion.power._consumos._promCons.promedioConsumosMensuales.toLocaleString('es-MX') + ' Kw');
        $('#tdConsumoActualKwBim').text(_combinaciones[ddlCombinacionesValor].combinacion.power._consumos._promCons.promConsumosBimestrales.toLocaleString('es-MX') + ' Kw');
        //Generacion
        $('#tdGeneracionKwMes').text(_combinaciones[ddlCombinacionesValor].combinacion.power.generacion.promedioDeGeneracion.toLocaleString('es-MX') + ' Kw');
        $('#tdGeneracionKwBim').text(_combinaciones[ddlCombinacionesValor].combinacion.power.generacion.promeDGeneracionBimestral.toLocaleString('es-MX') + ' Kw');
        //NuevoConsumo
        $('#tdNuevoConsumoMes').text((_combinaciones[ddlCombinacionesValor].combinacion.power._consumos._promCons.promedioConsumosMensuales - _combinaciones[ddlCombinacionesValor].combinacion.power.generacion.promedioDeGeneracion).toLocaleString('es-MX') + ' Kw');
        $('#tdNuevoConsumoBim').text(((_combinaciones[ddlCombinacionesValor].combinacion.power._consumos._promCons.promedioConsumosMensuales - _combinaciones[ddlCombinacionesValor].combinacion.power.generacion.promedioDeGeneracion) * 2).toLocaleString('es-MX') + ' Kw');
        /* [AhorroEconomico] */
        //ConsumoActual
        $('#tdConsumoActualDinMes').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.power.objConsumoEnPesos.pagoPromedioMensual.toLocaleString('es-MX') + ' MXN');
        $('#tdConsumoActualDinBim').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.power.objConsumoEnPesos.pagoPromedioBimestral.toLocaleString('es-MX') + ' MXN');
        //NuevoConsumo
        $('#tdNuevoConsumoDinMes').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.power.objGeneracionEnpesos.pagoPromedioMensual.toLocaleString('es-MX') + ' MXN');
        $('#tdNuevoConsumoDinBim').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.power.objGeneracionEnpesos.pagoPromedioBimestral.toLocaleString('es-MX') + ' MXN');
        //Ahorro
        $('#tdAhorroDinMes').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.roi.ahorro.ahorroMensualEnPesosMXN.toLocaleString('es-MX') + ' MXN');
        $('#tdAhorroDinBim').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.roi.ahorro.ahorroBimestralEnPesosMXN.toLocaleString('es-MX') + ' MXN');

        /* Totales */
        $('#tdSubtotalUSD').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.totales.precio.toLocaleString('es-MX') + ' USD');
        $('#tdTotalUSD').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.totales.precioMasIVA.toLocaleString('es-MX') + ' USD');
        $('#tdSubtotalMXN').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.totales.precioMXNSinIVA.toLocaleString('es-MX') + ' MXN');
        $('#tdTotalMXN').text('$ ' + _combinaciones[ddlCombinacionesValor].combinacion.totales.precioMXNConIVA.toLocaleString('es-MX') + ' MXN');

        ///
        Object.assign(_combinaciones[ddlCombinacionesValor].combinacion,{
            objResp: null
        });

        ///
        _combinaciones[ddlCombinacionesValor].combinacion.objResp = {
            consumo: {
                _promCons: _combinaciones[ddlCombinacionesValor].combinacion.power._consumos._promCons
            }
        };

        ///
        limpiarGrafico();
        pintarGrafico(_combinaciones[ddlCombinacionesValor].combinacion);
    }
    else{
        limpiarCampos();
    }
}

async function mostrarPanelSeleccionado(){
    let valueDDLPaneles = $('#listPaneles').val();

    limpiarCampos();
    limpiarGrafico();

    //Deshabiltar las recomendaciones si se selecciona un panel
    var listPaneles = document.getElementById("listPaneles");
    var selectedValue = listPaneles.value;

    // Obtén el primer select
    var ddlCombinaciones = document.getElementById("ddlCombinaciones");

    // Habilita o deshabilita el primer select según la selección del segundo
    if (selectedValue !== "") {
        ddlCombinaciones.disabled = true; // Bloquear el primer select
    } else {
        ddlCombinaciones.disabled = false; // Desbloquear el primer select
    }

    if(valueDDLPaneles !== "-1" || typeof valueDDLPaneles === "undefined"){
        /*#region Formating _respuestaPaneles*/
        let _paneles = sessionStorage.getItem('_respPaneles');
        _paneles = JSON.parse(_paneles);
        /*#endregion*/

        //void:
        mostrarRespuestaConsumos(_paneles[0].consumo);
        //void:
        mostrarRespuestaPaneles(_paneles[valueDDLPaneles].panel);

        //Se guarda - Panel seleccionado
        sessionStorage.removeItem('__ssPanelSeleccionado');
        sessionStorage.setItem('__ssPanelSeleccionado',JSON.stringify(_paneles[valueDDLPaneles].panel));

        //[Inversores]
        //Se obtienen los inveresores
        let _inversores = await obtenerInversoresParaPanelSeleccionado({
            potenciaReal: _paneles[valueDDLPaneles].panel.potenciaReal,
            numeroPaneles: _paneles[valueDDLPaneles].panel.noModulos,
            potenciaPanel: _paneles[valueDDLPaneles].panel.fPotencia
        });
        _inversores = _inversores.message; //Formating
        sessionStorage.removeItem("_respInversores");
        sessionStorage.setItem("_respInversores",JSON.stringify(_inversores));

        //:void() = Se pintan las MARCAS de inversores
        vaciarRespuestaInversores(_inversores);

        /* Se pinta el mejor CostoBeneficio en INVERSORES */
        let InversorCostoBeneficio = getInversorCostoBeneficio(0);

        //Guardar Inversor-CostoBeneficio [sessionStorage]
        sessionStorage.removeItem('ssInversorCostoBeneficio');
        sessionStorage.setItem('ssInversorCostoBeneficio',JSON.stringify(InversorCostoBeneficio));

        //:void() = Se pintan los MODELOS de inversores
        vaciarModelosInversores(InversorCostoBeneficio.vMarca);

        ///Se seleccionan DDL - MarcaInversor & ModeloInversor
        $('#listInversores option[value="'+InversorCostoBeneficio.vMarca+'"]').attr("selected", true);
        $('#listModelosInversor option[value="'+InversorCostoBeneficio.vNombreMaterialFot+'"]').attr("selected", true);

        /* [Viaticos] */
        let _viaticos = await calcularViaticosBT(InversorCostoBeneficio);

        mostrarRespuestaViaticos(_viaticos);//:void()

    }
    else{
        $('#listInversores').prop("disabled", true);
    }
}

function limpiarCampos(){

    $('#tdPanelPotenciaReal').text("");
    $('#tdCostoWatt').text("");
    $('#tdPanelModelo').text("");
    $('#tdPanelPotencia').text("");
    $('#tdPanelCantidad').text("");
    $('#tdInversorModelo').text("");
    $('#tdInversorPotencia').text("");
    $('#tdInversorCantidad').text("");
    $('#tdSubtotalUSD').text("");
    $('#tdTotalUSD').text("");
    $('#tdSubtotalMXN').text("");
    $('#tdTotalMXN').text("");
}

function mostrarRespuestaConsumos(Consumo){
    let promedioConsumoMensual = Consumo._promCons.consumoMensual.promedioConsumoMensual;

    $('#inpConsumoMensual').val(promedioConsumoMensual + 'kWh('+promedioConsumoMensual * 2+'/bim)');
}

function mostrarRespuestaPaneles(Panel){
    $('#tdPanelCantidad').text(Panel.noModulos);
    $('#tdPanelModelo').text(Panel.nombre);
    $('#tdPanelPotencia').text(Panel.fPotencia.toLocaleString('es-MX') + ' W');
    $('#tdPanelPotenciaReal').text(Panel.potenciaReal + ' Kw');
}

function obtenerInversoresParaPanelSeleccionado(PanelSeleccionado){ //Inversores
    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/inversoresSelectos',
            data: {
                potenciaReal: PanelSeleccionado.potenciaReal,
                numeroPaneles: PanelSeleccionado.numeroPaneles,
                potenciaPanel: PanelSeleccionado.potenciaPanel
            },
            dataType: 'json',
            success: function(_inversores){
                resolve(_inversores);
                console.log(_inversores);
            },
            error: function(error){
                alert('Hubo un error al intentar obtener los inversores para el panel seleccionado');
                console.log(error);
            }
        });
    });
}

function vaciarRespuestaInversores(resultInversores){ ///Se vacian MARCAS
    let dropDownListInversores = $('#listInversores');

    let InversoresGroupByMerch = (_inversores) => { //Retorna un objeto
        let invGroupByMerche = [];

        invGroupByMerche = _inversores.reduce((objMarca, objInversor) => {
            objMarca[objInversor.vMarca] = (objMarca[objInversor.vMarca] || []).concat(objInversor);
            return objMarca;
        },{});

        return invGroupByMerche;
    };

    //Se obtiene las marcas de los inversores
    InversoresGroupByMerch = InversoresGroupByMerch(resultInversores);
    ///Lo guardamos en un sessionStorage para futura implementacion
    sessionStorage.removeItem('InversoresGroupByMerch');
    sessionStorage.setItem('InversoresGroupByMerch', JSON.stringify(InversoresGroupByMerch));

    //Limpiar dropdownlist
    limpiarDropDownListInversores();

    //DropDownList-Paneles
    for(let marca in InversoresGroupByMerch)
    {
        dropDownListInversores.append(
            $('<option/>', {
                value: marca.toString(),
                text: marca.toString()
            })
        );
    }

    //Activar lista de inversores
    dropDownListInversores.prop("disabled", false);
}

function limpiarDropDownListInversores(){
    //Se borran los options
    $('#listInversores option').each(function(){
        if($(this).val() !== "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function getInversorCostoBeneficio(banderaMarcaSelected){ ///Retorna un Objeto {marca,modelo}
    let Respuesta = {};
    let _inversors = JSON.parse(sessionStorage.getItem("_respInversores")); //Lista de inversores
    let filtrarModelosInversores = (_inversores, marcaSelect) => { //Return: []
        let Response = [];

        _inversores.forEach(inversor => {
            if(inversor.vMarca === marcaSelect){
                Response.push(inversor);
            }
        });
        return Response;
    };
    let obtenerCostoBeneficio = (_inversores) => {
        let objResult = {};
        let costoMin = 0;

        _inversores.filter((inversor, index, _inversore) => {
            if(index > 0){
                //Se obtiene el -costoTotal- mas economico
                if(costoMin > inversor.costoTotal){
                    costoMin = inversor.costoTotal;
                    objResult = inversor;
                }
            }
            else if(index === 0 && _inversore.length > 1){ //Cuando -index- es igual a 0, pero la coleccion de inversores tiene mas de 1 equipo
                costoMin = inversor.costoTotal;
                objResult = inversor;
            }
            else if(index === 0 && _inversore.length === 1){ //Cuando -index- es igual a 0, pero la coleccion de inversores solo tiene 1 equipo
                objResult = inversor;
            }
        });

        return objResult;
    };

    switch(banderaMarcaSelected)
    {
        case 0:
            //El sistema selecciona el equipo
            Respuesta = obtenerCostoBeneficio(_inversors);
            break;
        case 1:
            //El usuario a seleccionado la -MARCA-, se le debe de retornar el MODELO mas economico
            let marcaSeleccionada = $('#listInversores').val();
            let _equiposPorMarca = filtrarModelosInversores(_inversors,marcaSeleccionada);

            //Se selecciona el mejor costo beneficio
            Respuesta = obtenerCostoBeneficio(_equiposPorMarca);
            break;
        default:
            -1;
            break;
    }

    return Respuesta;
}

function vaciarModelosInversores(marcaSeleccionada){//Se limpia el DDL - ModelosInversor de los antiguos elementos y se agregan nuevos
    let ddlModelosInversores = $('#listModelosInversor');

    /*#region Formating _respuestaInversores*/
    let _inversores = sessionStorage.getItem('_respInversores');
    _inversores = JSON.parse(_inversores);
    /*#endregion*/

    limpiarDropDownListModelosInversores();

    _inversores.forEach(inversor => {
        if(inversor.vMarca === marcaSeleccionada){
            ddlModelosInversores.append(
                $('<option/>', {
                    value: inversor.vNombreMaterialFot,
                    text: inversor.vNombreMaterialFot
                })
            );
        }
    });

    ddlModelosInversores.prop('disabled',false);
}

function limpiarDropDownListModelosInversores(){
    //Se borran los options
    $('#listModelosInversor option').each(function(){
        if($(this).val() !== "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function calcularViaticosBT(objInversor){
    let _cotizarViaticos = [];
    //Datos de la propuesta (consumos, direccion, tarifa)
    let datosPropuesta = cacharDatosPropuesta();
    //Equipos seleccionados
    let sspanel = sessionStorage.getItem('__ssPanelSeleccionado');
    let ssinversor = {};
    let route = '';
    let consumptions = [];
    let descuento = $('#inpSliderDescuento').val() || 0;
    let aumento = $('#inpSliderAumento').val() || 0;

    let bndPropuestaNueva = sessionStorage.getItem("bndPropuestaEditada"); //Bandra Propuesta Nueva
    let tipoCotizador = sessionStorage.getItem('tarifaMT'); /*[bajatension || mediatension]*/

    if(tipoCotizador === "null" || typeof tipoCotizador === 'undefined'){ /* [BajaTension] */
        route = '/calcularViaticosBTI';
        consumptions = JSON.parse(sessionStorage.getItem("_consumsFormated"));
        consumptions = consumptions.consumo;
    }
    else{ /* [MediaTension] */
        route = '/calcularVT';
        consumptions = JSON.parse(sessionStorage.getItem("_periodosMT"));
    }

    //Validacion de que no haya datos vacios
    if($('#listPaneles option:selected').val() !== -1 || $('#listPaneles option:selected').val() !== '-1'){
        if($('#listInversores option:selected').val() !== -1 || $('#listInversores option:selected').val() !== '-1'){
            if($('#listEstructura option:selected').val() !== -1 || $('#listEstructura option:selected').val() !== '-1'){
                if(bndPropuestaNueva === '1'){ //Propuesta modificada
                    descuento = sessionStorage.getItem("descuentoPropuesta");
                    aumento = sessionStorage.getItem("aumentoPropuesta");
                }

                if(objInversor === null || typeof objInversor === 'undefined'){
                    ssinversor = sessionStorage.getItem('__ssInversorSeleccionado');
                    ssinversor = ssinversor === null ? sessionStorage.getItem('ssInversorCostoBeneficio') : ssinversor;
                }
                else{
                    ssinversor = objInversor;
                }

                let estructuraSeleccionada = $('#listEstructura').val();

                let _agregados = sessionStorage.getItem("_agregados") === null ? null : JSON.parse(sessionStorage.getItem("_agregados"));//Comprobacion de que no venga vacio

                //
                _cotizarViaticos[0] = { panel: sspanel, inversor: ssinversor, descuento, aumento };

                /* */
                return new Promise((resolve, reject) => {
                    $.ajax({
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        type: 'POST',
                        url: route,
                        data: {
                            "idCliente": datosPropuesta.idCliente,
                            "arrayBTI": _cotizarViaticos,
                            "direccionCliente": datosPropuesta.direccionCliente,
                            "consumos": consumptions,
                            "tarifa": datosPropuesta.tarifa,
                            "descuentoPropuesta": descuento,
                            "aumentoPropuesta": aumento,
                            "estructura": estructuraSeleccionada,
                            "agregados": _agregados
                        },
                        dataType: 'json',
                        success: function(resultViaticos){
                            //Se limpia el storage
                            sessionStorage.removeItem('answPropuesta');
                            //Se llena el storage
                            sessionStorage.setItem('answPropuesta',JSON.stringify(resultViaticos.message));

                            resolve(resultViaticos);
                        },
                        error: function(error){
                            reject('Se produjo un error al intentar calcular viaticos: '+error);
                        }
                    });
                });
            }
            else{
                alert('Seleccione una estructura');
            }
        }
        else{
            alert('Seleccione un inversor');
        }
    }
    else{
        alert('Seleccione un panel');
    }
}

function mostrarRespuestaViaticos(_viatics){ ///Pintar resultados de inversores, totales, power, viaticos, etc
    let _viaticos = _viatics.message;

    console.log("MostraResuestaVIaticos2");
    console.log(_viaticos);

    sessionStorage.removeItem("ssViaticos");
    sessionStorage.setItem("ssViaticos", JSON.stringify(_viaticos));

    /*#region Formating*/
    let objResp = sessionStorage.getItem("_consumsFormated");
    objResp = JSON.parse(objResp);
    /*#endregion*/

    //Se pinta el grafico
    let Data = _viaticos[0];
    console.log("Data");
    console.log(Data);
    Object.assign(Data,{
        objResp: objResp
    });

    limpiarGrafico();
    pintarGrafico(Data);

    if(_viaticos[0].inversores.combinacion === "true"){
        $('#tdInversorCantidad').text(_viaticos[0].inversores.numeroDeInversores.MicroUno.vNombreMaterialFot + ': ' + _viaticos[0].inversores.numeroDeInversores.MicroUno.numeroDeInversores + '\n' + _viaticos[0].inversores.numeroDeInversores.MicroDos.vNombreMaterialFot + ': ' + _viaticos[0].inversores.numeroDeInversores.MicroDos.numeroDeInversores);
    }
    else{
        $('#tdInversorCantidad').text(_viaticos[0].inversores.numeroDeInversores);
    }

    $('#tdInversorPotencia').text(_viaticos[0].inversores.fPotencia + ' W');
    $('#tdInversorModelo').text(_viaticos[0].inversores.vNombreMaterialFot);

    //Resultados de -POWER-
    let generacionMensual = 0, generacionBimestral = 0;
    let nuevoConsumoBimestral = 0, nuevoConsumoMensual = 0;
    let promedioConsumoMensual = 0, promedioConsumoBimestral = 0;

    //Resultados -Economicos-
    let ahorroEconomicoMes = 0, ahorroEconomicoBim = 0;

    console.log("Tipo de cotizacion");
    console.log(_viaticos[0].tipoCotizacion);

    if(_viaticos[0].tipoCotizacion === 'mediaTension'){ //MediaTension
        ///KW
        promedioConsumoMensual = objResp.consumo._promCons.promedioConsumosMensuales;
        promedioConsumoBimestral = objResp.consumo._promCons.promConsumosBimestrales;
        generacionMensual = _viaticos[0].power.generacion.promedioGeneracionMensual;
        generacionBimestral = _viaticos[0].power.generacion.promedioGeneracionBimestral;
        nuevoConsumoMensual = this.isNegative((promedioConsumoMensual - generacionMensual));
        nuevoConsumoBimestral = nuevoConsumoMensual * 2;
    }
    else{ //BajaTension
        ///KW
        promedioConsumoMensual = objResp.consumo._promCons.consumoMensual.promedioConsumoMensual;

        console.log("promedioConsumoMensual");
        console.log(promedioConsumoMensual);

        if(_viaticos[0].power.generacion.promedioDeGeneracion){
            generacionMensual = _viaticos[0].power.generacion.promedioDeGeneracion;
            generacionBimestral = _viaticos[0].power.generacion.promeDGeneracionBimestral;
            promedioConsumoBimestral = _viaticos[0].power._consumos._promCons.promConsumosBimestrales;

            if(_viaticos[0].power.nuevosConsumos.promedioNuevoConsumoBimestral){ //Kw
                nuevoConsumoBimestral = this.isNegative(_viaticos[0].power.nuevosConsumos.promedioNuevoConsumoBimestral);
                nuevoConsumoMensual = this.isNegative(_viaticos[0].power.nuevosConsumos.promedioNuevosConsumosMensuales);
            }
        }
        else{
            generacionMensual = _viaticos[0].power.generacion.promedioGeneracionMensual;
        }

        ahorroEconomicoMes = _viaticos[0].roi.ahorro.ahorroMensualEnPesosMXN;
        ahorroEconomicoBim = _viaticos[0].roi.ahorro.ahorroBimestralEnPesosMXN;
    }

    //Se pintan
    switch(_viaticos[0].tipoCotizacion)
    {
        case 'bajaTension':
            //Tarifas (actual)
            $('#tdTarifaActual').text(_viaticos[0].power.old_dac_o_nodac);

            //Tarifa (nueva)
            $('#tdTarifaNueva').text(_viaticos[0].power.new_dac_o_nodac);

            //Consumo energetico (actual)
            $('#tdConsumoActualKwMes').text(promedioConsumoMensual.toLocaleString('es-MX') + ' kW');
            $('#tdConsumoActualKwBim').text(promedioConsumoBimestral.toLocaleString('es-MX') + ' kW');

            //Consumo economico (actual)
            $('#tdConsumoActualDinMes').text('$ '+ (_viaticos[0].power.objConsumoEnPesos.pagoPromedioBimestralConIva / 2).toLocaleString('es-MX') +' MXN');
            $('#tdConsumoActualDinBim').text('$ '+ _viaticos[0].power.objConsumoEnPesos.pagoPromedioBimestralConIva.toLocaleString('es-MX') +' MXN');

            //Generacion energetica
            $('#tdGeneracionKwMes').text(generacionMensual.toLocaleString('es-MX') + ' kW');
            $('#tdGeneracionKwBim').text(generacionBimestral.toLocaleString('es-MX') + ' kW');

            //Generacion economica
            $('#tdNuevoConsumoDinMes').text('$ ' + (_viaticos[0].power.objGeneracionEnpesos.pagoPromedioBimestralConIva / 2).toLocaleString('es-MX') +' MXN');
            $('#tdNuevoConsumoDinBim').text('$ ' + _viaticos[0].power.objGeneracionEnpesos.pagoPromedioBimestralConIva.toLocaleString('es-MX') +' MXN');

            //Ahorro energetico
            $('#tdNuevoConsumoMes').text(nuevoConsumoMensual.toLocaleString('es-MX') + ' kw');
            $('#tdNuevoConsumoBim').text(nuevoConsumoBimestral.toLocaleString('es-MX') + ' kw');

            //Ahorro economico
            $('#tdAhorroDinMes').text('$ ' + ahorroEconomicoMes.toLocaleString('es-MX') + ' MXN');
            $('#tdAhorroDinBim').text('$ ' + ahorroEconomicoBim.toLocaleString('es-MX') + ' MXN');

            //
            $('#tdPorcentajePropuesta').text(_viaticos[0].power.porcentajePotencia + '%');
            break;
        case 'mediaTension':
            //Tarifas (actual y nueva)
            $('#tdTarifaActual').text(_viaticos[0].power.old_dac_o_nodac);
            $('#tdTarifaNueva').text(_viaticos[0].power.new_dac_o_nodac);
            $('#trTarifaNueva').css('display','none'); //Se esconde celda de 'tarifaNueva'

            //Ahorro energetico
            $('#tdConsumoActualKwMes').text(promedioConsumoMensual.toLocaleString('es-MX') + ' kw');
            $('#tdConsumoActualKwBim').text(promedioConsumoBimestral.toLocaleString('es-MX') + ' kw');
            $('#tdGeneracionKwMes').text(generacionMensual.toLocaleString('es-MX') + ' kw');
            $('#tdGeneracionKwBim').text(generacionBimestral.toLocaleString('es-MX') + ' kw');
            $('#tdNuevoConsumoMes').text(nuevoConsumoMensual.toLocaleString('es-MX') + ' kw');
            $('#tdNuevoConsumoBim').text(nuevoConsumoBimestral.toLocaleString('es-MX') + ' kw');

            //Ahorro en dinero
            $('#tdConsumoActualDinMes').text('$ ' + _viaticos[0].roi.consumo.consumoMensualPesosMXN.toLocaleString('es-MX') + ' MXN');
            $('#tdConsumoActualDinBim').text('$ ' + _viaticos[0].roi.consumo.consumoBimestralPesosMXN.toLocaleString('es-MX') + ' MXN');
            $('#tdNuevoConsumoDinMes').text('$ ' + (_viaticos[0].roi.generacion.nuevoPagoBimestral / 2).toLocaleString('es-MX') + ' MXN');
            $('#tdNuevoConsumoDinBim').text('$ ' + _viaticos[0].roi.generacion.nuevoPagoBimestral.toLocaleString('es-MX') + ' MXN');

            //Porcentaje propuesta
            $('#tdPorcentajePropuesta').text(_viaticos[0].power.porcentajePotencia + '%');
            break;
        default:
            -1;
            break;
    }

    //Se pintan los resultados del calculo de viaticos
    $('#tdSubtotalUSD').text('$ ' + _viaticos[0].totales.precio.toLocaleString('es-MX'));
    $('#tdTotalUSD').text('$ ' + _viaticos[0].totales.precioMasIVA.toLocaleString('es-MX'));
    $('#tdSubtotalMXN').text('$ ' + _viaticos[0].totales.precioMXNSinIVA.toLocaleString('es-MX'));
    $('#tdTotalMXN').text('$ ' + _viaticos[0].totales.precioMXNConIVA.toLocaleString('es-MX'));

    $('#tdCostoWatt').text('$ ' + _viaticos[0].totales.precio_watt + ' USD');

    $('#tdROIbruto').text(+_viaticos[0].roi.roiEnAnios+' año(s)');
    $('#tdROIdeduccion').text(+_viaticos[0].roi.roiConDeduccion+' año(s)');

    ///Porcentaje de propuesta que aparece en el panelAjustePropuesta
    $('#inpSliderPropuesta').val(_viaticos[0].power.porcentajePotencia);
    $('#rangeValuePropuesta').val(_viaticos[0].power.porcentajePotencia);

    //Porcentaje de descuentoPropuesta que aparece en el panelAjustePropuesta
    $('#inpSliderDescuento').val(_viaticos[0].descuento.porcentaje);
    $('#rangeValueDescuento').val(_viaticos[0].descuento.porcentaje);
}

async function mostrarInversorModeloSeleccionado(){
    let valueListModlsInv = $('#listModelosInversor').val(); //Nombre - Modelo de inversor
    let _inversors = JSON.parse(sessionStorage.getItem("_respInversores"));
    console.log("Modelos de inversor");
    console.log(_inversors);

    limpiarResultados(1);

    if(valueListModlsInv !== '-1' || valueListModlsInv !== -1){
        let modelosInversorFiltrado = searchInversor(_inversors,valueListModlsInv); //Se obtiene los modelos que le pertenecen a la MARCA_SELECCIONADA

        sessionStorage.removeItem('__ssInversorSeleccionado');
        sessionStorage.setItem('__ssInversorSeleccionado', JSON.stringify(modelosInversorFiltrado));

        let _viatico = await calcularViaticosBT(modelosInversorFiltrado);
        mostrarRespuestaViaticos(_viatico);
    }
}

function limpiarResultados(limpiaResult){
//     /* 0 - paneles
//     1 - inversores */

    if(limpiaResult === 0){
        /*Limpiar Resultados de -Paneles-*/
        $('#tdPanelPotencia').text('');
        $('#tdPanelCantidad').text('');
        $('#tdPanelModelo').text('');

        $('#tdCostoWatt').text('');
        $('#tdPanelPotenciaReal').text('');
    }
    else{ //Inversores
        $('#tdInversorModelo').text('');
        $('#tdInversorPotencia').text('');
        $('#tdInversorCantidad').text('');
        $('#tdSubtotalUSD').text('');
        $('#tdTotalUSD').text('');
        $('#tdSubtotalMXN').text('');
        $('#tdTotalMXN').text('');
    }
}

function searchInversor(_inversor,marcaInv){
    /* Retorna todos los *modelos - filtrados* relacionados con la MARCA que se pase por parametro */

    let Result = {};

    for(let i=0; i<_inversor.length; i++)
    {
        if(_inversor[i].vNombreMaterialFot === marcaInv){
            Result = _inversor[i];
        }
    }

    return Result;
}

async function cambiarEstructura(){
    let tipoCotizacion = sessionStorage.getItem('tarifaMT');
    let viaticosResult = null;

    if(tipoCotizacion === "null" || typeof tipoCotizacion === 'undefined'){ ///BajaTension
        viaticosResult = await calcularViaticosBT();
    }
    else{ ///MediaTension
        viaticosResult = await calcularViaticosMT();
    }

    mostrarRespuestaViaticos(viaticosResult);
}

async function mostrarInversorSeleccionado(){ //Muestra segun la MARCA, el mejor MODELO *CostoBeneficio*
    let ddlInversoresValue = $('#listInversores').val(); //DDL - Marca del Inversor
    console.log(ddlInversoresValue);

    limpiarResultados(1);
    limpiarDropDownListModelosInversores();

    if(ddlInversoresValue === '-1' || ddlInversoresValue === -1){
        activarDesactivarBotones(1,0); //Se desactivan controles
    }
    else{
        activarDesactivarBotones(1,1); //Se activan controles

        let objInversorCB = getInversorCostoBeneficio(1);

        //Se llena el DDL-Modelos
        vaciarModelosInversores(objInversorCB.vMarca);

        //Se pinta en el DDL - ModelosInversores, el mejor equipo *CostoBeneficio*
        $('#listModelosInversor option[value="'+objInversorCB.vNombreMaterialFot+'"]').attr("selected", true);

        let _viaticos = await calcularViaticosBT(objInversorCB);
        mostrarRespuestaViaticos(_viaticos); //:void()
    }
}

function limpiarDropDownListPaneles(){
    //Se borran los options
    $('#listPaneles option').each(function(){
        if($(this).val() !== "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function limpiarDropDownListEstructuras(){
    //Se borran los options
    $('#listEstructura option').each(function(){
        if($(this).val() !== "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function activarDesactivarBotones(equipo,habilidad){
    /*1er - N
     * 0 - Paneles
     * 1 - Inversores
     * /*2do - N
     ******* 0 - Desactivado
     ******* 1 - Activado
    */

    if(equipo == 1){
        if(habilidad == 0){
            $('#divTotalesProject').css("display",""); //???

            //Se bloquean botones de GenerarPDF y GuardarPropuesta
            $('#btnGuardarPropuesta').prop("disabled", true);
            $('#btnGenerarEntregable').prop("disabled", true);

            //Panel de ajuste de cotizacion - Desaparece
            $('#btnModalAjustePropuesta').attr("disabled",true);

            //Check Inversor-Modelos
            $('#chckModelosInversor').attr("disabled",true);
        }
        else{
            //Se desbloquea boton de -PanelAjustePropuesta-
            $('#listInversores').prop("disabled", false);

            //Se desbloquean botones de GenerarPDF y GuardarPropuesta
            $('#btnGuardarPropuesta').prop("disabled", false);
            $('#btnGenerarEntregable').prop("disabled", false);

            //Check Inversor-Modelos
            $('#chckModelosInversor').attr("disabled",false);
        }
    }
}

async function modificarPropuesta(){

    let tipoCotizacion = sessionStorage.getItem('tarifaMT');

    //Modificar sessionStorage de "propuestaNueva" o "propuestaModificada" *0 = Nueva* *1 = Modificada*
    /*sessionStorage.removeItem("bndPropuestaEditada");
    sessionStorage.setItem("bndPropuestaEditada", 1);

    //Se cambia de estado los dropDownList de Equipos [ Paneles, Inversores ]
    $('listPaneles').val('-1');
    $('listInversores').val('-1');*/

    // //Se limpian inputs de resultados
    limpiarCampos();

    // //Cachar los valores de los porcentajes / panel de ajuste
    let porcentajePropuesta = parseFloat($('#inpSliderPropuesta').val()) || 0;
    let porcentajeDescuento = parseFloat($('#inpSliderDescuento').val()) || 0;
    let porcentajeAumento = parseFloat($('#inpSliderAumento').val()) || 0;

    // //Se guarda el porcentaje de descuento, para su futura implementacion (ya que el descuento se aplica hasta el step:"cobrar_viaticos")
    sessionStorage.removeItem("descuentoPropuesta");
    sessionStorage.setItem("descuentoPropuesta",porcentajeDescuento);
    sessionStorage.removeItem("aumentoPropuesta");
    sessionStorage.setItem("aumentoPropuesta",porcentajeAumento);

    // //Se arma la data para editar la propuesta
    let dataPorcentajes = { porcentajePropuesta, porcentajeDescuento, porcentajeAumento };
        console.log("Prueba");

    // //Se realiza nuevamente la propuesta
    if(tipoCotizacion === "null" || typeof tipoCotizacion === 'undefined'){ ///BajaTension

        if(porcentajeDescuento > 0)
        {
            await mostrarPanelSeleccionado();
        }
        await calcularPropuestaBT(null, dataPorcentajes);
    }
    else{ ///MediaTension
        await calcularPropuestaMT(dataPorcentajes);
    }
}

function isNegative(numero){
    return numero = numero < 0 ? 0 : numero;
}
/*#endregion*/
