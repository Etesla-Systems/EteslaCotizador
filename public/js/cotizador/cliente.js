async function buscarCoincidenciaCliente(event) {
    const busqueda = document.getElementById('buscarCliente');
    const textoBusqueda = busqueda.value.trim();

    // Validar que el campo esté lleno
    if (textoBusqueda.length > 0) {
        const clienteResult = await buscarClientePorNombre(textoBusqueda);

        // Validar si hubo coincidencia con la búsqueda del cliente
        if (clienteResult.length > 0) {
            // Limpiar ddlCoincidenciasClientes
            limpiarDDLEntidad('ddlCoincidenciasCliente');

            // Llenar ddlCoincidenciasClientes
            llenarDDLCoincidenciasClientes(clienteResult);

            // Mostrar ddlCoincidenciasClientes
            statusControlsBusqueda(0);
        } else {
            // Mostrar ddlCoincidenciasClientes
            statusControlsBusqueda(1);
        }
        } else {
            alert('Por favor ingrese en nombre de un cliente para realizar la busqueda');
        }
}

function llenarDDLCoincidenciasClientes(_clientes){
    $.each(_clientes, function(clientesCotizador,cliente){
        $('#ddlCoincidenciasCliente').append(
            $('<option/>', {
                value: cliente.vNombrePersona + ' ' + cliente.vPrimerApellido + ' ' + cliente.vSegundoApellido,
                text: cliente.vNombrePersona + ' ' + cliente.vPrimerApellido + ' ' + cliente.vSegundoApellido
            })
        );
    });
}


function seleccionarCliente(optionSelected){
    let optionValue = optionSelected.value;
    let idDDL = optionSelected.id;

    if(optionValue != -1){
        //Obtener el sessionStorage de las coincidenciasClientes
        let _coincidenciasClientes = JSON.parse(sessionStorage.getItem('coincidenciaClientes'));

        //Concidencias Filtradas para pintar el cliente que se seleccionó
        _coincidenciasClientes = _coincidenciasClientes.find(cliente => (cliente.vNombrePersona + ' ' + cliente.vPrimerApellido + ' ' + cliente.vSegundoApellido) === optionValue);

        /* Pintar / Cargar el cliente en los inputs */
        pintarClienteDetails(_coincidenciasClientes);

        //
        $('#'+idDDL).css("display","none");
        $('#buscarCliente').val('');
    }
}

function pintarClienteDetails(Clientee){
    let Cliente = Clientee; //Formating

    //Cliente - info
    $('#inpClienteId').val(Cliente.idCliente);
    $('#inpDetailsClienteNombre').val(Cliente.vNombrePersona);
    $('#inpDetailsCliente1erAp').val(Cliente.vPrimerApellido);
    $('#inpDetailsCliente2doAp').val(Cliente.vSegundoApellido);
    $('#inpDetailsClienteTel').val(Cliente.vTelefono);
    $('#inpDetailsClienteCel').val(Cliente.vCelular);
    //Direccion - info
    $('#inpDetailsClienteCP').val(Cliente.cCodigoPostal);
    $('#inpDetailsClienteCalle').val(Cliente.vCalle);
    $('#inpDetailsClienteMunic').val(Cliente.vMunicipio);
    $('#inpDetailsClienteCiud').val(Cliente.vCiudad);
    $('#inpDetailsClienteEstado').val(Cliente.vEstado);
}

function statusControlsBusqueda(opcion){
    switch(opcion)
    {
        case 0: //Con coincidencias
            //Se muestra la lista desplegable de -Coincidencias-
            $('#ddlCoincidenciasCliente').css("display","");
            //
            $('#txtNoHayCoincidencia').css("display","none");
            break;
        case 1: //Sin coincidencias
            //Se muestra el mensaje -Sin coincidencias-
            $('#txtNoHayCoincidencia').css("display","");
            //
            $('#ddlCoincidenciasCliente').css("display","none");
            break;
        default:
            -1;
            break;
    }
}

function buscarClientePorNombre(cliente){
    return new Promise((resolve,reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'PUT',
            url: '/buscarCliente',
            data: { nombre: cliente },
            dataType: 'json',
            success: function(clientResult){
                //Guardar coincidencias en un sessionStorage
                sessionStorage.removeItem('coincidenciaClientes');
                sessionStorage.setItem('coincidenciaClientes',JSON.stringify(clientResult.message));

                resolve(clientResult.message);
            },
            error: function(error){
                console.log(error);
                reject('Se ha generado un error al intentar buscar al cliente por su nombre');
            }
        });
    });
}

function limpiarDDLEntidad(ddlEntidad){
    $('#'+ddlEntidad+' option').each(function(){
        if($(this).val() != "-1"){
            $(this).val('');
            $(this).text('');
            $(this).remove();
        }
    });
}

function llenarDDLEntidad(ddlEntidad, Entidades, propiedad){
    //Limpiar ListaDesplegable
    limpiarDDLEntidad(ddlEntidad);

    //Llenar ListaDesplegable
    for(let entidad of Entidades){
        $('#'+ddlEntidad).append(
            $('<option/>', {
                value: entidad.nombre,
                text: entidad.nombre
            })
        );
    }
}
function buscarClientePorNombre(cliente){
    return new Promise((resolve,reject) => {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'PUT',
            url: '/buscarCliente',
            data: { nombre: cliente },
            dataType: 'json',
            success: function(clientResult){
                //Guardar coincidencias en un sessionStorage
                sessionStorage.removeItem('coincidenciaClientes');
                sessionStorage.setItem('coincidenciaClientes',JSON.stringify(clientResult.message));

                resolve(clientResult.message);
            },
            error: function(error){
                console.log(error);
                reject('Se ha generado un error al intentar buscar al cliente por su nombre');
            }
        });
    });
}

function CoindicenciasCP(event) {

    const inputBuscarCP = document.getElementById('inpCP');
    const textoBus = inputBuscarCP.value.trim();

    const inputMunicipio = document.getElementById('inpClienteMunicipio');
    const inputCiudad = document.getElementById('inpClienteCiudad');
    const inputEstado = document.getElementById('inpClienteEstado');

        // Validar que el campo de búsqueda no esté vacío
        if (textoBus.length > 0)
        {
            // Realizar la búsqueda en el archivo de texto
            fetch('../assets/txt/CPS.txt')
                .then(response => response.text())
                .then(data => {
                    // Dividir el texto en filas (cada fila es una entrada)
                    const entradas = data.split('\n');
                    const addresses = entradas.map(row => row.split('|'));

                    //Filtrar nombre de colonia
                    const results = addresses.filter(address => address[0] === textoBus);
                    const nombreCol = results.map(result => result[1]);

                    const selectColonia = document.getElementById('ddlColonia');
                    selectColonia.innerHTML = '';

                    nombreCol.forEach(colonia => {
                        const option = document.createElement('option');
                        option.value = colonia;
                        option.text = colonia;
                        selectColonia.appendChild(option);
                    });

                    selectColonia.addEventListener('change', function() {
                        const coloniaSeleccionada = selectColonia.value;

                        // Buscar la entrada correspondiente a la colonia seleccionada
                        const entradaColonia = results.find(result => result[1] === coloniaSeleccionada);

                        if (entradaColonia) {
                            const municipio = entradaColonia[3];
                            const ciudad = entradaColonia[5];
                            const estado = entradaColonia[4];

                            inputMunicipio.value = municipio;
                            inputCiudad.value = ciudad;
                            inputEstado.value = estado;
                        } else {
                            // Limpiar los inputs si no se encuentra la entrada
                            inputMunicipio.value = '';
                            inputCiudad.value = '';
                            inputEstado.value = '';
                        }
                    });

                    // Mostrar las coincidencias en consola
                    console.log('Coincidencias:', nombreCol);
                })
                .catch(error => {
                    console.error('Ocurrió un error:', error);
                });
        } else {
            console.log('Campo de búsqueda vacío');
        }
}



