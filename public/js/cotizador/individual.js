function getCotizacionIndividual(dataCotInd){
    sessionStorage.removeItem("tarifaMT");
    sessionStorage.setItem("tarifaMT", "individual");

    try{
        return new Promise((resolve, reject) => {
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'POST',
                url: '/enviarCotizIndiv',
                data: { dataCotInd: dataCotInd },
                dataType: 'json',
                success: function(cotizacionIndividual){
                    if(cotizacionIndividual.status === 200){
                        cotizacionIndividual = cotizacionIndividual.message;

                        //***
                        console.log(cotizacionIndividual);

                        //Guardar PropuestaResult en un SessionStorage
                        sessionStorage.removeItem('ssPropuestaIndividual');
                        sessionStorage.setItem('ssPropuestaIndividual',JSON.stringify(cotizacionIndividual[0]))

                        resolve(cotizacionIndividual);
                    }
                    else{
                        console.log(cotizacionIndividual);
                        throw 'Error! Status Server 500!';
                    }
                },
                error: function(error){
                    console.log(error);
                    throw 'Ocurrio un error';
                }
            });
        });
    }
    catch(error){
        throw error;
    }
}

async function calcularCotizacionIndividual(){ //:Main()
    try{
        console.log("Entro");
        let dataCotizacionIndividual = catchDataCotizacionIndividual();
        console.log(dataCotizacionIndividual);
        let CotizacionIndividual = await getCotizacionIndividual(dataCotizacionIndividual);
        console.log(dataCotizacionIndividual);
        pintarResultadoCotizacion(CotizacionIndividual); //:void
    }
    catch(error){
        console.log(error);
        alert(error);
    }
}

/*#region Funcionalidad*/
function catchDataCotizacionIndividual(){
    let dataCotIndividual = {
        cliente: { id: null, direccion: null },
        ajustePropuesta: { aumento: null, descuento: null },
        complementos: {
            manoObra: "1",
            otros: "1",
            viaticos: { hospedaje: "1", comida: "1", pasaje: "1" },
            fletes: "1"
        },
        agregados: null,
        equipos: null
    };

    let catchDireccion = () => {
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

    dataCotIndividual.cliente.id = $('#inpClienteId').val();
    dataCotIndividual.cliente.direccion = catchDireccion();

    /* Cliente */
    if(validarUsuarioCargado(dataCotIndividual.cliente.id) === true){
        /* Equipos */
        if(validarInputsEquipos() === true){
            /* Equipos (paneles, inversores, estructuras) */
            dataCotIndividual.equipos = catchDataEquipos();

            /* Agregados */
            dataCotIndividual.agregados = sessionStorage.getItem("_agregados") === null ? null : JSON.parse(sessionStorage.getItem("_agregados"));//Comprobacion de que no venga vacio

            /* AjustePropuesta */
            dataCotIndividual.ajustePropuesta = {
                aumento: $('#inpSliderAumento').val() || 0,
                descuento: $('#inpSliderDescuento').val() || 0
            };

            return dataCotIndividual;
        }
    }
}

function pintarResultadoCotizacion(cotizacionResult){
    let cotizacionIndividual = cotizacionResult[0]; //Formating of Array to Object
    let potenciaInstalad = 0, costoPanel = 0, costoInversor = 0, costoEstructura = 0;

    /* [ Setters data ] */
    /// [ Paneles ]
    if(cotizacionIndividual.paneles != null){
        potenciaInstalad = ((cotizacionIndividual.paneles.fPotencia * cotizacionIndividual.paneles.noModulos) / 1000);
        costoPanel = cotizacionIndividual.paneles.costoTotal;
    }

    /// [ Inversores ]
    if(cotizacionIndividual.inversores != null){
        costoInversor = cotizacionIndividual.inversores.costoTotal;
    }

    /// [ Estructuras ]
    if(cotizacionIndividual.estructura._estructuras != null){
        costoEstructura = cotizacionIndividual.estructura.costoTotal;
    }

    /// [Totales && Subtotales]
    let costoViaticos = cotizacionIndividual.totales.totalViaticosMT;
    let costoMO = cotizacionIndividual.totales.manoDeObra + cotizacionIndividual.totales.otrosTotal;
    let costoFletes =cotizacionIndividual.totales.fletes; //$$ - USD
    let subtotalUSD = cotizacionIndividual.totales.precio;
    let subtotalMXN = cotizacionIndividual.totales.precioMXNSinIVA;
    let totalUSD = cotizacionIndividual.totales.precioMasIVA;
    let totalMXN = cotizacionIndividual.totales.precioMXNConIVA;

    /* ------------ */
    $('#resPotenciaInstalada').text(potenciaInstalad + ' kW');
    $('#resCostoPanel').text('$ ' + costoPanel + ' USD');
    $('#resCostInversor').text('$ ' + costoInversor + ' USD');
    $('#resCostEstruct').text('$ ' + costoEstructura + ' USD');
    $('#resCostoViaticos').text('$ ' + costoViaticos + ' USD');
    $('#resCostoMO').text('$ ' + costoMO + ' USD');
    $('#resCostoFletes').text('$ ' + costoFletes + ' USD');

    //Subtotales y totales
    $('#tdSubtotalUSD').text('$ ' + subtotalUSD.toLocaleString('es-MX') + ' USD');
    $('#tdSubtotalMXN').text('$ ' + subtotalMXN.toLocaleString('es-MX') + ' MXN');
    $('#tdTotalUSD').text('$ ' + totalUSD.toLocaleString('es-MX') + ' USD');
    $('#tdTotalMXN').text('$ ' + totalMXN.toLocaleString('es-MX') + ' MXN');
}

function catchDataEquipos(){
    let equipos = { paneles: null, inversores: null, estructuras: null };

    if($('#optPaneles').val() !== '-1' || $('#optPaneles').val() !== -1){
        equipos.paneles = {
            modelo: $('#optPaneles').val(),
            cantidad: $('#inpCantPaneles').val()
        };
    }

    if($('#optInversores').val() !== '-1' || $('#optInversores').val() !== -1){
        let tipoInversor = $('#optInversores option:selected').attr("title");

        if(tipoInversor === "Combinacion"){
            let nombreCombinacion = $('#optInversores option:selected').text();
            let Micros = obtenerNombresEquiposMicros(nombreCombinacion);

            equipos.inversores = {
                vNombreMaterialFot: 'nombreCombinacion',
                equipo1: {
                    modelo: Micros.equipo1,
                    cantidad: $('#inpCantMicro1').val()
                },
                equipo2: {
                    modelo: Micros.equipo2,
                    cantidad: $('#inpCantMicro2').val()
                },
                combinacion: true
            };
        }
        else{
            equipos.inversores = {
                modelo: $('#optInversores').val(),
                cantidad: $('#inpCantInversores').val()
            };
        }
    }

    if($('#optEstructuras').val() !== '-1' || $('#optEstructuras').val() !== -1){
        equipos.estructuras = {
            modelo: $('#optEstructuras').val(),
            cantidad: $('#inpCantEstructuras').val()
        };
    }

    return equipos;
}

function obtenerNombresEquiposMicros(combinacionMicros){ //Return [Object]
    /* [Descripcion]
      Se obtiene el string del nombre de la -combinacionMicros ["microInversor1+microInversor2"]-.
      Se recorre la cadena y se separa los dos nombres de los micros. Se retornan los 2 nombres por separado
    */
    let objResult = {};
    let equipo1 = "", equipo2 = "";
    let totalDeCaracteres = 0, indice = 0;

    //Devuelve la longitud del nombre de la -combinacion-
    totalDeCaracteres = combinacionMicros.length;

    //Equipo1
    indice = combinacionMicros.indexOf("+");
    equipo1 = combinacionMicros.substring(0, indice);

    //Equpo2
    indice = equipo1.length + 1;
    equipo2 = combinacionMicros.substring(indice, totalDeCaracteres);

    return objResult = { equipo1, equipo2 };
}
/*#endregion*/

/*#region Validaciones*/
function validarUsuarioCargado(direccion_Cliente){
    if(direccion_Cliente){
        return true;
    }
    else{
        throw "Falto cargar un cliente";
    }
}

function validarInputsEquipos(){ //Valida solo los inputs vacios de los *dropDownList que fueron ocupados*
    let _listasDesplegables = ['optPaneles','optInversores','optEstructuras']
    let inputDropDownListId = '', valorInput = '', tipoInversor = '';

    //Iteras coleccion de dropDownList
    $.each(_listasDesplegables, function(i,nombreDDL){
        //Se valida que el dropDownList haya sido usado
        if($('#'+nombreDDL).val() !== '-1'){
            //Se identifica el -input- del dropDownList ocupado
            switch(nombreDDL)
            {
                case 'optPaneles':
                    inputDropDownListId = 'inpCantPaneles';
                    break;
                case 'optInversores':
                    /* tipoInversor = [ inversor, micro, combinacion ] */
                    tipoInversor = $('#'+nombreDDL+' option:selected').attr("title");

                    inputDropDownListId = 'inpCantInversores';
                    break;
                case 'optEstructuras':
                    inputDropDownListId = 'inpCantEstructuras';
                    break;
                default:
                    -1;
                    break;
            }

            //Se valida que dicho -input- NO ESTE VACIO
            if(tipoInversor !== '' && tipoInversor === 'Combinacion'){ ///Combinacion de MicroInversores
                let valInpMicroInv1 = null, valInpMicroInv2 = null;

                valInpMicroInv1 = $('#inpCantMicro1').val();
                valInpMicroInv2 = $('#inpCantMicro2').val();

                if(valInpMicroInv1 === "" && valInpMicroInv2 === ""){
                    throw 'Alguno de los inputs pertenecientes a la combinacion de micro inversores se encuentra vacio.';
                }
                else if(valInpMicroInv1 === "0" || valInpMicroInv2 === "0"){
                    throw 'No se permite el valor {0}';
                }

                valorInput = [valInpMicroInv1,valInpMicroInv2];
            }
            else{
                valorInput = $('#'+inputDropDownListId).val();
            }

            if(valorInput.length < 1){
                throw 'Input '+inputDropDownListId+', se encuentra vacio.\nFavor de llenarlo o inhabilitar la lista desplegable correspondiente';
            }
            else if(valorInput === '0'){
                throw 'El valor del Input '+inputDropDownListId+', no puede ser 0.\nFavor de ingresar un valor mayor a 0';
            }
        }
        else if(i === 2 && valorInput === ""){ //En caso de que todas las listas desplegables esten inhabilitadas
            throw 'No se a seleccionado ningun equipo';
        }
    });

    return true;
}
/*#endregion*/

function sliderModificarPropuesta()
{

    if($('#inpSliderDescuento').val() >= 1 || $('#inpSliderDescuento').val() >= '1'){
        //habilitar la barra otra vez--cambio--
        $('#inpSliderAumento').prop("disabled", false);
    }
}

