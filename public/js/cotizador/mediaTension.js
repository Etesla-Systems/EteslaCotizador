function calcularViaticosMT(obInversor){
    let idCliente = $('#clientes [value="' + $("input[name=inpSearchClient]").val() + '"]').data('value');
    let panel = sessionStorage.getItem("__ssPanelSeleccionadoMT");
    let inversor = {};
    let direccion = $('#municipio').val();
    let periodos = sessionStorage.getItem("_consumsFormated"); ///Periodos recolectados (sin calcular)
    periodos = JSON.parse(periodos);

    _agregado = _agregado; ///Arreglo de objAgregados*
    _agregado = _agregado == null || _agregado.length === 0 ? null : _agregado;///Comprobacion de que no venga vacio

    if(obInversor == null || typeof tipoCotizacion === 'undefined'){ //El inversor es seleccionado por el sistema
        inversor = JSON.parse(sessionStorage.getItem("__ssInversorSeleccionado"));
    }
    else{ //El inversor es seleccionado por el usuario
        inversor = obInversor;
    }

    let estructuraSeleccionada = $('#listEstructura').val();
    estructuraSeleccionada = estructuraSeleccionada !== '-1' || estructuraSeleccionada !== -1 ? estructuraSeleccionada : null;

    let objPropuesta = { panel: panel, inversor: inversor, periodos: periodos, estructura: estructuraSeleccionada };

    //Se obtiene tarifa_mediaTension (GDMTO/GDMTH)
    let tarifaMT = sessionStorage.getItem("tarifaMT");

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/calcularVT',
            data: {
                "idCliente": idCliente,
                "propuesta": objPropuesta,
                "direccionCliente": direccion,
                "tarifa": tarifaMT,
                "_agregados": _agregado
            },
            dataType: 'json',
            success: function(resultViaticos){
                if(resultViaticos.status === "200" || resultViaticos.status === 200){
                    //Se guarda la propuesta calculada (c/Viaticos)
                    sessionStorage.removeItem("propuestaMT");
                    sessionStorage.setItem('propuestaMT',JSON.stringify(resultViaticos.message));

                    resolve(resultViaticos);
                }
                else{
                    console.log('Error, calcular viaticos: '+resultViaticos.message);
                    alert('Error, calcular viaticos: \nChecar "console.log() del navegador"');
                }
            },
            error: function(error){
                reject('Se produjo un error al intentar calcular viaticos: '+error);
            }
        });
    });
}

async function calcularPropuestaMT(dataEditada){
    let dataEdited = dataEditada || null; //Propuesta nueva o editada
    let dataSent = {arrayPeriodos:'', direccionCliente:'', idCliente:'', tarifa:'', porcentajePropuesta:0, porcentajeDescuento:0};
    let tarifaMT = sessionStorage.getItem("tarifaMT");
    //Validar que el cliente este cargado
    let clienteCargado = validarClienteCargado();

    dataSent.arrayPeriodos = _periodos;
    dataSent.direccionCliente = clienteCargado.direccion;
    dataSent.idCliente = clienteCargado.id;
    dataSent.tarifa = tarifaMT;

    if(dataEdited != null){ ///Propuesta editada
        dataSent.porcentajePropuesta = dataEdited.porcentajePropuesta;
    }

    if(clienteCargado != false){
        if(validarPeriodosVacios() === true){
            if(dataEdited === null){ ///Cotizacion Nueva
                //Pintar vista de resultados
                await getVistaResultados();

                //Mandar a calcular la propuesta
                let cotizacionPaneles = await sendMediaTensionCotizacion(dataSent);

                //
                console.log(cotizacionPaneles);

                vaciarRespuestaPaneles(cotizacionPaneles);

                //Se obtiene estructuras
                let estructuras = await getListEstructuras();
                llenarDropDownListEstructuras(estructuras.message);
                //El sistema selecciona una estructura
                seleccionaUnaEstructura('Everest');
            }
            else{ ///Cotizacion Editada

            }
        }
    }
    else{
        alert('Falta cargar un cliente!!');
    }
}
