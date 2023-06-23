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
