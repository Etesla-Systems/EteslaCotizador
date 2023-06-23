$(document).on('ready',function(){
    sessionStorage.removeItem("_agregados");
    sessionStorage.removeItem("contadorAgregados");
});

/*   Agregados_CRUD   */
/*#region Logica*/
function addAgregado(){
    let _agregados = [];
    let nombreAgregao = $('#inpAgregado').val();
    let cantidadAgregado = $('#inpCantidadAg').val();
    let precioAgregado = $('#inpPrecioAg').val();
    let contadorDeAgregados = 0;

    /* Contador - Agregados */
    contadorDeAgregados = sessionStorage.getItem('contadorAgregados');
    contadorDeAgregados = contadorDeAgregados != null ? parseInt(contadorDeAgregados) : 0;

    if(validarInputsVaciosAg(nombreAgregao) === true && validarInputsVaciosAg(cantidadAgregado) === true && validarInputsVaciosAg(precioAgregado) === true){
        let Agregado = {
            nombreAgregado: nombreAgregao,
            cantidadAgregado: cantidadAgregado,
            precioUnitarioMXN: precioAgregado
        };

        //[]
        if(contadorDeAgregados === 0){
            _agregados[contadorDeAgregados] = Agregado;
        }
        else{
            _agregados = JSON.parse(sessionStorage.getItem("_agregados"))
            _agregados[contadorDeAgregados] = Agregado;
        }

        //Pintar <td>'Agregado'</td> en tabla
        let tableBody = $('#tblAgregados > tbody');
        tableBody.append('<tr id="trContAg'+contadorDeAgregados+'"><td id="tdAgregado'+contadorDeAgregados+'">'+(contadorDeAgregados+1)+'</td><td>'+_agregados[contadorDeAgregados].nombreAgregado+'</td><td>'+_agregados[contadorDeAgregados].cantidadAgregado+'</td><td id="tdPrecioUnitario">$ '+_agregados[contadorDeAgregados].precioUnitarioMXN.toLocaleString('es-MX')+' MXN</td><td id="tdSubtotal">$ '+(_agregados[contadorDeAgregados].cantidadAgregado * _agregados[contadorDeAgregados].precioUnitarioMXN).toLocaleString('es-MX')+' MXN</td><td><button id="'+contadorDeAgregados+'" class="btn btn-xs btn-danger deleteAg" title="Eliminar" onclick="eliminarAgregado(this);"><img src="https://img.icons8.com/android/12/000000/delete.png"/></button></td></tr>');

        //Se afecta[SUMA] el contador -costoTotalAgregados-
        costoTotalAgregados(0, (_agregados[contadorDeAgregados].cantidadAgregado * _agregados[contadorDeAgregados].precioUnitarioMXN));

        //
        sessionStorage.setItem("_agregados", JSON.stringify(_agregados));

        contadorDeAgregados++; //Se incrementa el contadorDeAgregados
        sessionStorage.setItem("contadorAgregados", contadorDeAgregados); //Se modifica por el nuevo -valor- al sessionStorage
        limpiarInputsAgregado();
    }
}

function costoTotalAgregados(operacion, costoTotal){ //Afecta el -contador- de *CostoTotal* de Agregados y pintarlo/mostrarlo
    /*
        ->operacion [suma || resta]
        ->costoTotal [cantidadDeAgregados * costoUnitarioAgregado]
    */
    let costoTotalAgregados = 0;

    //Leer el sessionStorage del contador -costoTotal-
    costoTotalAgregados = sessionStorage.getItem('costoTotalAgregados');
    costoTotalAgregados = costoTotalAgregados != null ? costoTotalAgregados : 0; //Si encuentra el sessionStorage de -costoTotalAgregados-, lo settea y si no, se le inicializa 0
    costoTotalAgregados = parseFloat(costoTotalAgregados);

    //Captar que operacion se realizara
    switch(operacion)
    {
        case 0: //Suma
            //Se realiza la operacion correspondiente
            costoTotalAgregados = costoTotalAgregados + costoTotal;

            //Se settea el valor al -sessionStorage-
            sessionStorage.removeItem('costoTotalAgregados');
            sessionStorage.setItem('costoTotalAgregados',costoTotalAgregados);
            break;
        case 1: //Resta
            //Se realiza la operacion correspondiente
            costoTotalAgregados = costoTotalAgregados - costoTotal;

            //Se settea el valor al -sessionStorage-
            sessionStorage.removeItem('costoTotalAgregados');
            sessionStorage.setItem('costoTotalAgregados',costoTotalAgregados);
            break;
        default:
            -1;
            break;
    }

    //Pintar resultado del -contador-
    $('#costoTotalAgregados').text('$ ' + costoTotalAgregados.toLocaleString('es-MX') + ' MXN');
}

function limpiarInputsAgregado(){
    $('.inpAg').val('');
    $('#inpCantidadAg').focus();
}

function validarInputsVaciosAg(val){
    let valor = val === undefined ? "" : val;
    valor = valor.replace("&nbsp;", "");

    if (!valor || 0 === valor.trim().length){
        alert('Campos pertenecientes a *Agregado*, vacios. Favor de llenar!');
        return false;
    }
    else{
        return true;
    }
}

function catchPDFConfiguration(){ ///Return [Object]
    /* Se obtiene un Objeto de como se configurara/imprimira el PDF */

    let PDFConfiguration = {};

    let subDesglozados = $('#swtSubtDesglozados').is(":checked"); //Subtotales desglozados

    PDFConfiguration = {
        subtotalesDesglozados: subDesglozados
    };

    return PDFConfiguration;
}

function generarPDF(){
    let data = {};

    //Validar que tipo de cotizacion se esta tratando de generarPDF
    let tipoCotizacion = sessionStorage.getItem("tarifaMT");

    if(tipoCotizacion === 'GDMTO' || tipoCotizacion === 'GDMTH'){ ///MediaTension
        data = sessionStorage.getItem("propuestaMT");
    }
    else if(tipoCotizacion === 'null' || typeof tipoCotizacion === 'undefined'){ ///BajaTension
        data = sessionStorage.getItem("answPropuesta"); //Sin Combinaciones
        data = data != null ? data : sessionStorage.getItem("arrayCombinaciones"); //Con Combinaciones
    }
    else{ ///Individual
        data = sessionStorage.getItem('ssPropuestaIndividual');
    }

    data = JSON.parse(data);
    data = data.tipoCotizacion ? data : data;

    //Validar que tenga -COMBINACIONES- se agrega la data de la -CombinacionSeleccionada-
    if(data.combinaciones){
        let _dataFiltrada = getDataCombinacionesFiltrada(data);

        //Agregar el -tipoCotizacion- a *_dataFiltrada*
        Object.assign(_dataFiltrada, { tipoCotizacion: 'Combinacion' });

        //Se *settea* la nueva data [_dataFiltrada] con la data original [data]
        data = _dataFiltrada;
    }

    //Obtener la configuracion del PDF
    let PdfConfig = catchPDFConfiguration();

    //Se agrega a la [data] el Objeto de -PDFConfig-
    Object.assign(data,{PdfConfig: PdfConfig});
    console.log("Antes del ajax");
    console.log(data);

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/PDFgenerate',
            data: data,
            xhrFields: {
                responseType: 'blob'
            },
            success: function(pdfResponse, status){
                if(status === 'success'){
                    resolve({ pdfResponse, data });
                    console.log("dentro de ajax");
                    console.log(data);
                }
            },
            error: function(error){
                console.log(error);
                reject('Se presento una falla a la hora de querer generar el PDF\n'+error);
            }
        });
    });
}

async function generarEntregable(){ //:void()

    try{
        let pdfResponse = await generarPDF(); //Return: PDFFile encode
        visualizandoPDF(pdfResponse); //:void()
    }
    catch(error){
        console.log(error);
        alert(error);
    }
}

function visualizandoPDF(pdfFile){
    let blobPDF = new Blob([pdfFile.pdfResponse],{type: "application/pdf"});

    // IE doesn't allow using a blob object directly as link href
    // instead it is necessary to use msSaveOrOpenBlob
    if (window.navigator && window.navigator.msSaveOrOpenBlob) {
        window.navigator.msSaveOrOpenBlob(blobPDF);
        return;
    }

    let link = document.createElement('a');

    let fileName = getPDFFileName(pdfFile.data);

    link.href = window.URL.createObjectURL(blobPDF);
    link.download = fileName;
    link.click();

    //Only Firefox Browser
    setTimeout(function(){
        // For Firefox it is necessary to delay revoking the ObjectURL
        window.URL.revokeObjectURL(pdfFile.data);
    }, 100);
}

function getPDFFileName(dataPropuesta){
    //Validar si la propuesta es -NORMAL- o -COMBINACIONES-
    dataPropuesta = dataPropuesta.tipoCotizacion !== "Combinacion" ? dataPropuesta : dataPropuesta.propuesta;

    let nombreCliente = dataPropuesta.cliente.vNombrePersona + dataPropuesta.cliente.vPrimerApellido + dataPropuesta.cliente.vSegundoApellido;
    let tipoCotizacion = dataPropuesta.tipoCotizacion;
    let potencia = dataPropuesta.paneles.potenciaReal;

    return nombreCliente + '_' + tipoCotizacion + '_' + potencia + 'w' + '_' + Date.now() + '.pdf';
}

function guardarPropuesta(){
    let dataToSent = { propuesta: null };
    let tarifaMT = sessionStorage.getItem("tarifaMT");

    if(tarifaMT === "null" || typeof tarifaMT === 'undefined'){ //BajaTension
        //Se obtiene la propuesta -BajaTension-
        let propuesta = sessionStorage.getItem("answPropuesta");

        //Se valida la propuesta BajaTension... Si es ConCombinaciones o SinCombinaciones
        //Si tiene combinaciones, unicamente se guarda la -combinacionSalvada- ya que es la que se va a guardar en la BD
        propuesta = propuesta != null ? propuesta : sessionStorage.getItem("combinacionSafe");

        //
        propuesta = JSON.parse(propuesta);
        propuesta = propuesta.tipoCotizacion ? propuesta : propuesta[0];

        dataToSent.propuesta = propuesta;
    }
    else if(tarifaMT == "individual"){ //Individual
        dataToSent.propuesta = sessionStorage.getItem("ssPropuestaIndividual");
    }
    else{ //Mediatension
        dataToSent.propuesta = sessionStorage.getItem("propuestaMT");
    }

    return new Promise((resolve, reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            url: '/GuardarPropuesta',
            dataType: 'json',
            data: dataToSent,
            success: function(respuesta){
                if(resolve.status == "500" || resolve.status == 500){
                    console.log('Ah ocurrido un problema al intentar guardar la propuesta:');
                    console.log(respuesta.message);
                    alert('Ah ocurrido un problema al intentar guardar la propuesta');
                }
                else{
                    alert(respuesta.message.message);
                    $("#btnGuardarPropuesta").prop("disabled", true);
                }
            },
            error: function(error){
                alert('Hubo un error al intentar guardar la propuesta: '+error.message);
            }
        });
    });
}
