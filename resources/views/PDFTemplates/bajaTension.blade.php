<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<style type="text/css">
    /* --------------- ---------------------- */
    * {
        font-family: "Calibri, sans-serif";
    }

    html {
        margin: 0;
    }

    .footer-page {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        height: 19px;
        background-color: #4474C2;
    }

    /* Contenedores */
    .container-fluid {
        padding: 0 !important;
    }

    .container-table {
        margin-top: -25px;
        margin-left: 25px;
        margin-right: 20px;
    }

    /* Salto de pagina [hr] */
    hr.salto-pagina {
        page-break-after: always;
        border: 0;
        margin: 0;
        padding: 0;
    }

    hr.linea-division {
        height: 6.5px;
        border-style: none;
    }

    /* --------------- ---------------------- */
    /* Contenido hoja */
    #logoTipoEtesla {
        width: 22%;
    }

    #recuadroPaneles {
        width: 100%;
        height: 315px;
        background-repeat: no-repeat;
        margin-left: 80px;
        border-radius: 15px;
    }

    #recuadroFlotante {
        background-color: white;
        margin-top: -260px;
        margin-left: 80px;
        border-radius: 15px;
        width: 360px;
        height: 260px;
        text-align: left;
    }

    /* Tablas */
    .table-costos-proyecto
    {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
        border-radius: 10px;
        border: 1px solid black;
        overflow: hidden;
    }

    .celda-costos {
        background-color: #7ab317;
        color: white;
        font-size: 16px;
        font-weight: bold;
    }

    .table-contenedor {
        width: 100%;
        border-collapse: collapse;
    }

    /* Tab - Agregados */
    .table-agregados {
        width: 100%;
        text-align: center;
        border: 1px solid black;
        border-collapse: collapse;
        margin-top: 25px;
        margin-left: 25px;
        margin-right: 25px;
    }

    .table-agregados td {
        border: 1px solid black;
    }

    /* Tab - Financiamiento */
    .tabFinanciamiento {
        width: 100%;
        color: #fff;
        background-color: #808D99;
        border-collapse: collapse;
        border-radius: 20px;
        overflow: hidden;
    }

    .tabFinanciamiento th, .tabFinanciamiento td {
        border: 3px solid white;
        color: white;
        text-align: center;
    }

    /* Textos */
    .textIncProupesta {
        margin-left: 15px;
        line-height: 75%;
    }

    .text-inferior-pag1 {
        font-size: 11px;
        font-weight: bolder;
    }

    .text-inferior-pag1-secundary {
        font-size: 10px;
    }

    .garantias {
        line-height: 5%;
        text-align: center;
    }

    .nota {
        font-size: 11px;
        color: #969696;
        text-align: center;
    }

    /* Cards */
    .card {
        width: 175px;
        padding: 20px;
        text-align: center;
        border-width: 3px;
        border-style: solid;
        border-color: #7ab317;
        border-top-left-radius: 30px 30px;
        border-top-right-radius: 30px 30px;
        border-bottom-left-radius: 30px 30px;
        border-bottom-right-radius: 30px 30px;
    }

    .card-header {
        background: #7ab317;
        color: #FFFFFF;
        margin: -20px;
        padding: 10px;
        font-size: 10px;
        height: 2px;
        border-top-left-radius: 30px 30px;
        border-top-right-radius: 30px 30px;
    }

    .card-body {
        height: 115px;
        background: #FCFAEB;
        margin: -20px;
        padding: 20px;
        font-size: 18px;
        line-height: 20%;
        border-bottom-left-radius: 30px 30px;
        border-bottom-right-radius: 30px 30px;
    }

    .banderas
    {
        width: 4%; /* o el porcentaje deseado */
        height: auto;
    }

    .margins
    {
        margin-top: 3px;
        margin-bottom: 3px;
    }
</style>
<body>
<!-- Page 1 -->
<div class="container-fluid"  style="border-top: 10px solid #4474C2;">
    <table>
        <tr>
            <td>
                <img id="logoTipoEtesla"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}">
            </td>
            <td>
                <h1 style="font-size:25px; text-align:right; margin-right: 27px;">SISTEMA FOTOVOLTAICO INTERCONECTADO A
                    LA RED DE CFE</h1>
            </td>
        </tr>
    </table>
    <img id="recuadroPaneles"
         src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/Paneles-solares-tesla.jpg'))) }}"/>
    <div id="recuadroFlotante">
        <div>
            <p id="fechaCreacion" class="textIncProupesta"><strong>Fecha de creacion: {{ date('Y-m-d') }}</strong></p>
            <p id="nombreCliente" class="textIncProupesta">
                <strong>Cliente: </strong>
                {{ $cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"] }}
            </p>
            <p id="direccionCliente" class="textIncProupesta">
                <strong>Direccion: </strong>
                {{ $cliente["vCalle"] .", ". $cliente["cCodigoPostal"] .", ". $cliente["vMunicipio"] ." ". $cliente["vCiudad"] ." ". $cliente["vEstado"] }}
            </p>
            @if($cliente["vEmail"] != "")
                <p id="email" class="textIncProupesta"><strong>Correo electrónico: </strong>{{ $cliente["vEmail"] }}</p>
            @endif
            @if($cliente["vTelefono"] != "" || $cliente["vCelular"] != "")
                <p id="telefono" class="textIncProupesta"><strong>Contacto: </strong>{{ $cliente["vTelefono"]  . "  /  " .  $cliente["vCelular"] }}</p>
            @endif
            <p id="asesor" class="textIncProupesta">
                <strong>Asesor:</strong>
                {{ $vendedor["vNombrePersona"] ." ". $vendedor["vPrimerApellido"] ." ". $vendedor["vSegundoApellido"] }}
            </p>
            <p id="sucursal" class="textIncProupesta">
                <strong>Sucursal: </strong>{{ $vendedor["vOficina"] }}
            </p>
            <p id="caducidad-propuesta" style="margin-left:13px;">
                <strong>
                    Validez de <u>{{ $expiracion["cantidad"] . " " . $expiracion["unidadMedida"] }}</u>
                </strong>
            </p>
        </div>
    </div>
    <div class="container-table">
        <h3>Paquete fotovoltaico de {{ $paneles["potenciaReal"] }} kWp</h3>
        <table class="table-costos-proyecto">
            <thead>
            <tr>
                <th scope="col" class="celda-costos">TIPO</th>
                <th scope="col" class="celda-costos">MARCA</th>
                <th scope="col" class="celda-costos">CANTIDAD</th>
                <th scope="col" class="celda-costos">NOMBRE</th>
                <th scope="col" class="celda-costos">TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <tr id="desglocePanel" style="background-color:lightgrey; text-align: center;">
                <td style="text-align: center;">Panel</td>
                <td id="marcaPanel" style="text-align: center;">{{ $paneles["vMarca"] }}</td>
                <td id="cantidadPanel" style="text-align: center;">{{ $paneles["noModulos"] }}</td>
                <td id="modeloPanel" style="font-size: 13px; text-align: center;">{{ $paneles["nombre"] }}</td>
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td id="costoTotalPanel" style="text-align: center;">
                        ${{ number_format($paneles["costoTotal"],2) }} USD
                    </td>
                @else
                    <td id="costoTotalPanel" style="text-align: center;"></td>
                @endif
            </tr>
            <tr id="desgloceInversor">
                <td style="text-align: center;">Inversor</td>
                <td id="marcaInversor" style="text-align: center;">
                    {{ $inversores["vMarca"] }}
                </td>
                @if($inversores["combinacion"] === "true")
                    <td colspan="2" style="text-align: center;">
                        <p style="font-size:10px;">
                            {{ $inversores["numeroDeInversores"]["MicroUno"]["vNombreMaterialFot"] }}
                            : {{ $inversores["numeroDeInversores"]["MicroUno"]["numeroDeInversores"] }}
                        </p>
                        <p style="font-size:10px;">
                            {{ $inversores["numeroDeInversores"]["MicroDos"]["vNombreMaterialFot"] }}
                            : {{ $inversores["numeroDeInversores"]["MicroDos"]["numeroDeInversores"] }}
                        </p>
                    </td>
                @else
                    <td id="cantidadInversor" style="text-align: center;">
                        {{ $inversores["numeroDeInversores"] }}
                    </td>
                    <td id="modeloInversor" style="font-size: 13px; text-align: center;">
                        {{ $inversores["vNombreMaterialFot"] }}
                    </td>
                @endif
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td id="costoTotalInversor" style="text-align: center;">
                        ${{ number_format($inversores["costoTotal"],2) }} USD
                    </td>
                @else
                    <td></td>
                @endif
            </tr>
            <tr id="desgloceEstructura" style="background-color:lightgrey;">
                <td style="text-align: center;">Estructura</td>
                <td id="marcaEstructura" style="text-align: center;">{{ $estructura["_estructuras"]["vMarca"] }}</td>
                <td id="cantidadEstructura" style="text-align: center;">{{ $estructura["cantidad"] }}</td>
                <td style="text-align: center;">Estructura de aluminio</td>
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td id="costoTotalEstructura" style="text-align: center;">
                        ${{ number_format($estructura["costoTotal"],2) }} USD
                    </td>
                @else
                    <td></td>
                @endif
            </tr>
            @if(!is_null($agregados["_agregados"]))
                <!-- SI LA COTIZACION TIENE *ESTRUCTURAS* -->
                <tr id="desgloceAgregados">
                    <td style="text-align: center;">Agregados</td>
                    <td></td>
                    <td></td>
                    <td style="text-align: center;">
                        <strong>Agregados (Desgloce en pag. 2)</strong>
                    </td>
                    <td></td>
                </tr>
            @endif
            <tr>
                <td style="text-align: center;">Mano de obra</td>
                <td></td>
                <td></td>
                <td style="font-size:10px;">*Instalación *Servicio *Anclaje *Fijación</td>
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td id="costoTotalMO" style="text-align: center;">
                        ${{ number_format($totales["manoDeObra"],2) }} USD
                    </td>
                @else
                    <td id="costoTotalMO"></td>
                @endif
            </tr>
            <tr style="background-color:lightgrey;">
                <td style="text-align: center;">Otros</td>
                <td></td>
                <td></td>
                <td style="font-size:10px;">*Cableado *Protecciones *Tramite CFE *Monitoreo PostVenta (permanente)</td>
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td id="costoTotalOtros" style="text-align: center;">
                        ${{ number_format($totales["otrosTotal"],2) }} USD
                    </td>
                @else
                    <td></td>
                @endif
            </tr>
            <tr>
                <td></td>
                @if($descuento["porcentaje"] > 0)
                    <td style="background-color:#4474C2;">
                        <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                            Total s/Descuento
                        </p>
                    </td>
                @else
                    <td></td>
                @endif
                @if($descuento["porcentaje"] > 0)
                    <td id="tdDescuento" style="background-color:#7ab317;">
                        <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                            Descuento ({{ $descuento["porcentaje"] }}%)
                        </p>
                    </td>
                @else
                    <td></td>
                @endif
                <td align="center"><img
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/USA_1.png'))) }}" class="banderas margins"/>
                </td>
                <td align="center"><img
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/MEX_1.png'))) }}" class="banderas margins"/>
                </td>
            </tr>
            <tr style="background-color: lightgrey; text-align: center;">
                <td><strong>Subtotal</strong></td>
                @if($descuento["porcentaje"] > 0)
                    <td id="tdTotalAntesDeDescuento"
                        style="border-right:solid #4474C2; border-left:solid #4474C2; border-bottom:solid #4474C2;">
                        <p style="font-weight:bolder; text-align:center; font-size:15px; background-color:#FFF66D;">
                            ${{ number_format($descuento["precioSinDescuento"]) }} USD
                        </p>
                    </td>
                @else
                    <td></td>
                @endif
                @if($descuento["porcentaje"] > 0)
                    <td id="descuentoUSD"
                        style="border-right:solid #7ab317; border-left:solid #7ab317; border-bottom:solid #7ab317;">
                        <p style="font-weight:bolder; text-align:center; font-size:15px; background-color:#FFF66D;">
                            ${{ number_format($descuento["descuento"],2) }} USD
                        </p>
                    </td>
                @else
                    <td></td>
                @endif
                <td id="subtotalSinIVAUSD" align="center">
                    ${{ number_format($totales["precio"], 2) }} USD
                </td>
                <td id="subtotalSinIVAMXN" align="center">
                    ${{ number_format($totales["precioMXNSinIVA"], 2) }} MXN
                </td>
            </tr>
            <tr style="background-color: lightgrey; text-align: center;">
                <td><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td id="totalConIVAUSD" align="center">
                    ${{ number_format($totales["precioMasIVA"], 2) }} USD
                </td>
                <td id="totalConIVAMXN" align="center">
                    ${{ number_format($totales["precioMXNConIVA"], 2) }} MXN
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- Leyenda - Tipo de cambio -->
    <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
        <p class="nota"><strong style="color: lightgrey;">NOTA: </strong>El tipo de cambio <strong
                style="color: #2E2D2D;">(${{ $tipoDeCambio }} mxn)</strong> se tomará el reportado por Banorte a la
            Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto,
            35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega
            preparado para conexión con CFE.</p>
    </div>
    <!-- Logotipos && garantias de las marcas de los equipos -->
    <table class="table-contenedor" style="margin-top:20px;">
        <tr>
            <td id="imgLogoPanel" align="center" style="border: none;">
                @php($image = $paneles['vMarca'] . '.png')
                <img style="width: 15%;  height: auto;"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
            </td>
            <td id="imgLogoInversor" align="center" style="border: none;">
                @php($image = $inversores['vMarca'] . '.png')
                <img style="width: 15%;  height: auto;"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
            </td>
            <td id="imgLogoInversor" align="center" style="border: none;">
                @php($image = $estructura["_estructuras"]['vMarca'] . '.png')
                <img style="width: 15%;  height: auto;"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
            </td>
        </tr>
    </table>
    <!-- Fin logos/marcas equip. -->

    <hr class="linea-division" style="background-color:#4474C2;">

    <table class="table-contenedor">
        <tr>
            <!-- CARDS -->
            <td align="center" >
                <!-- CARD - "ANTES" -->
                <div style="margin-left:30px;">
                    <div class="card">
                        <!-- CONSUMO ACTUAL -->
                        <div class="card-header">
                            <p style="color:#FFFFFF; margin-top:-6px; font-weight:bolder;">
                                Total a pagar del periodo facturado
                            </p>
                        </div>
                        <div class="card-body">
                            <p style="font-weight:bolder; text-align:center; margin-top:10px; font-size:29px;">
                                ${{ number_format($power["objConsumoEnPesos"]["pagoPromedioBimestralConIva"], 2) }}
                            </p>
                            <hr class="linea-division" style="background-color:#7ab317; margin-top:-17px; margin-left:-20px; margin-right:-20px; height:15px;">
                            <img height="19px" width="19px" style="margin-top:2px; margin-left:-170px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                            <p style="font-size:14px; text-align:center; margin-top:-10px;">
                                Pago actual s/paneles
                            </p>
                            <img height="19px" width="19px" style="margin-left:170px; margin-top:-30px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                            <hr class="linea-division" style="background-color:#7ab317; margin-top:-5px; margin-left:-20px; margin-right:-20px; height:15px;">
                            <p style="font-weight:bolder; margin-top:25px; font-size:19px;">
                                {{ number_format($power["_consumos"]["_promCons"]["promConsumosBimestrales"]) }} Kw
                            </p>
                            <p style="font-size:9px; background-color:#F7FB0C; font-weight:bolder; margin-top:-12px; text-align:center;">
                                ({{ $power["old_dac_o_nodac"] }})
                            </p>
                        </div>
                    </div>
                </div>
            </td>
            <td align="center">
                <!-- CARD - "NUEVO_CONSUMO" -->
                <div style="margin-left:-80px;">
                    <div class="card" >
                        <!-- CONSUMO ACTUAL -->
                        <div class="card-header">
                            <p style="color:#FFFFFF; margin-top:-6px; font-weight:bolder;">
                                Total a pagar del periodo facturado
                            </p>
                        </div>
                        <div class="card-body">
                            <p style="font-weight:bolder; text-align:center; margin-top:10px; font-size:29px;">
                                ${{ number_format($power["objGeneracionEnpesos"]["pagoPromedioBimestralConIva"] ,2) }}
                            </p>
                            <hr class="linea-division" style="background-color:#7ab317; margin-top:-17px; margin-left:-20px; margin-right:-20px; height:15px;">
                            <img height="19px" width="19px" style="margin-top:2px; margin-left:-170px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                            <p style="font-size:14px; text-align:center; margin-top:-10px;">
                                Pago actual c/paneles
                            </p>
                            <img height="19px" width="19px" style="margin-left:170px; margin-top:-30px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                            <hr class="linea-division" style="background-color:#7ab317; margin-top:-5px; margin-left:-20px; margin-right:-20px; height:15px;">
                            <p style="font-weight:bolder; text-align:center; margin-top:25px; font-size:19px;">
                                {{ number_format($power["nuevosConsumos"]["promedioNuevoConsumoBimestral"],2) }} Kw
                            </p>
                            <p style="font-size:9px; background-color:#F7FB0C; font-weight:bolder; margin-top:-12px; text-align:center;">
                                ( {{ $power["new_dac_o_nodac"] }} )
                            </p>
                        </div>
                    </div>
                </div>
            </td>
            <td align="center">
                <!-- CARD - "PROMEDIO CONSUMO BIMESTRAL" $propuesta["power"]["generacion"]["_generacionBimestral"];-->
                <div style="margin-right:20px;">
                    <img height="32px" width="32px" style="margin-top:15px; margin-left:-30px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/generation-sun-electricity.png'))) }}"/>
                    <h3 style="margin-left:-50px;">Generación bimestral promedio:</h3>
                    <h2 style="color:#082567; margin-left:-50px;">{{ $power["generacion"]["promeDGeneracionBimestral"] }} kWh</h2>
                </div>
            </td>
        </tr>
    </table>
    <div class="footer-page"></div>
</div>
<!-- Fin pagina 1 -->

<hr class="salto-pagina">

<!-- Pagina 2 -->
<div class="container-fluid" style="border-top: 10px solid #5576F2;">
    <table>
        <tr>
            <td>
                <!-- LogoTipo Etesla -->
                <img id="logoTipoEtesla"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}">
            </td>
            <td style="padding-left: 75px;">
                <h1 style="font-size:25px; text-align:right; margin-right: 27px;">
                    FINANCIAMIENTO Y RETORNO DE INVERSIÓN
                </h1>
            </td>
        </tr>
    </table>
    <!-- Tabla Financiamiento - ROI -->
    <p class="nota" style="margin-top:-20px; text-align:left; margin-left:60px;">
        <strong>NOTA: </strong>
        El calculo del retorno incluye deduccion fiscal
    </p>
    <div style="margin-left:40px; margin-right:40px;">
        <table>
            <tr>
                <td>
                    <table class="tabFinanciamiento">
                        <tr>
                            <th style="height:16px;">
                                <p style="font-size:14px; margin-left:6px; margin-right:6px;">
                                    Pago de contado
                                </p>
                            </th>
                            <td style="background-color:#4474C2;">
                                <p style="font-size:14px; margin-left:6px; margin-right:6px;">
                                    ${{ number_format($totales["precioMXNConIVA"], 2) }}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table class="tabFinanciamiento">
                        <tr>
                            <th style="height:16px;">
                                <p style="font-size:14px; margin-left:6px; margin-right:6px;">Ahorro mensual de luz</p>
                            </th>
                            <td style="background-color:#4474C2;">
                                <p style="font-size:14px; margin-left:6px; margin-right:6px;">
                                    ${{ number_format($roi["ahorro"]["ahorroMensualEnPesosMXN"] ,2) }}
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table class="tabFinanciamiento">
                        <tr>
                            <th style="height:16px;">
                                <p style="font-size:14px; margin-left:6px; margin-right:6px;">Retorno de inversión</p>
                            </th>
                            <td style="background-color:#4474C2;">
                                <p style="font-size:16px; margin-left:6px; margin-right:6px; font-weight:bolder;">
                                    {{ $roi["roiEnAnios"] }} año(s)
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table class="tabFinanciamiento">
            <tr>
                <th>Tarjeta de credito</th>
                <th style="background-color: #4474C2;">3 meses</th>
                <th style="background-color: #4474C2;">6 meses</th>
                <th style="background-color: #4474C2;">9 meses</th>
                <th style="background-color: #4474C2;">12 meses</th>
                <th style="background-color: #4474C2;">18 meses</th>
            </tr>
            <tr>
                <th> Pago mensual</th>
                <td>
                    ${{ number_format($financiamiento["objMensualidadesCreditCard"]["tresMeses"] ,2) }}
                </td>
                <td>
                    ${{ number_format($financiamiento["objMensualidadesCreditCard"]["seisMeses"], 2) }}
                </td>
                <td>
                    ${{ number_format($financiamiento["objMensualidadesCreditCard"]["nueveMeses"], 2) }}
                </td>
                <td>
                    ${{ number_format($financiamiento["objMensualidadesCreditCard"]["doceMeses"], 2) }}
                </td>
                <td>
                    ${{ number_format($financiamiento["objMensualidadesCreditCard"]["dieciochoMeses"], 2) }}
                </td>
            </tr>
        </table>
        <br>
        <table class="tabFinanciamiento">
            <tr>
                <th>Financiamiento</th>
                <th style="background-color: #4474C2;">15%</th>
                <th style="background-color: #4474C2;">35%</th>
                <th style="background-color: #4474C2;">50%</th>
            </tr>
            <tr>
                <th>Enganche</th>
                <td>
                    ${{ number_format($financiamiento["objEnganche"]["quincePorcent"], 2) }}
                </td>
                <td>
                    ${{ number_format($financiamiento["objEnganche"]["treintacincoPorcent"], 2) }}
                </td>
                <td>
                    ${{ number_format($financiamiento["objEnganche"]["cincuentaPorcent"], 2) }}
                </td>
            </tr>
        </table>
        <p class="nota" style="text-align:left; margin-left:20px;">
            <strong>NOTA: </strong>
            Esa tabla de financiamiento es de referencia y puede variar en funcion de las condiciones de la financiera.
        </p>
        <table id="tabFinanciamient" class="tabFinanciamiento">
            <tr>
                <th>Pagos mensuales por plazo</th>
                <th style="background-color: #4474C2">15%</th>
                <th style="background-color: #4474C2">35%</th>
                <th style="background-color: #4474C2">50%</th>
            </tr>
            @for($x = 12; $x <= 84; $x = $x + 12)
                <tr>
                    <th>A {{ $x }} meses</th>
                    @for($i=1; $i<=3; $i++)
                        @php($porcent = '')

                        @switch($i)
                            @case(1)
                                {{ $porcent = 'fifteenPorcent' }}
                                @break
                            @case(2)
                                {{ $porcent = 'thirtyFive' }}
                                @break
                            @case(3)
                                {{ $porcent = 'fiftyPorcent' }}
                                @break
                            @default
                                {{ $i == 3 }}
                                @break;
                        @endswitch

                        @if($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] > $roi["ahorro"]["ahorroMensualEnPesosMXN"] && $financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] < ($roi["ahorro"]["ahorroMensualEnPesosMXN"] * 1.10))
                            <td id="amarillo" style="background-color:#FAE610">
                                ${{ number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                            </td>
                        @elseif($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent] <= $roi["ahorro"]["ahorroMensualEnPesosMXN"])
                            <td id="verde" style="background-color:#44C331">
                                ${{ number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                            </td>
                        @else
                            <td id="normal" style="background-color:#808D99">
                                ${{ number_format($financiamiento["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                            </td>
                        @endif
                    @endfor
                </tr>
            @endfor
        </table>
        <!-- Fin_Tabla financiamiento -->
    </div>
    <hr class="linea-division" style="background-color:#5576F2; margin-left:-15px; margin-right:-15px;">
    <table id="tableGraficas">
        <tr>
            <td id="grfEnergetico">
                <img style="width:40%; height:210px; margin-left:85px;" src='{{ $Chart["chartEnergetico"] }}'/>
            </td>
            <td id="grfEconomico">
                <img style="width:40%; height:210px; margin-left:85px;" src='{{ $Chart["chartEconomico"] }}'/>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: 450px;">

                <p style="margin-top: 10px; margin-left: 55px; text-align: left; font-weight: bold;">Somos una empresa avalada por:</p>
                <div style="margin-top:10px;">
                    <div name="ANCE">
                        <div style="margin-left:55px; height:68px; width:60px">
                            <img style="width:100%; height:auto;" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/ance.jpg'))) }}">
                        </div>
                        <div style="margin-top:-70px; margin-left:133px;">
                            <p class="text-inferior-pag1">
                                Certificado de proveedor<br>confiable
                            </p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px; width: 30%;">
                                Clave: 20FIR00010A00R00
                            </p>
                        </div>
                    </div>
                    <div>
                        <div style="margin-left:55px; height:68px; width:60px">
                            <img style="width:100%; height:auto;" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/wwf.jpg'))) }}">
                        </div>
                        <div style="margin-top:-70px; margin-left:133px;">
                            <p class="text-inferior-pag1">World Wildlife Fund</p>
                            <p class="text-inferior-pag1-secundary" style="margin-top:-9px;">
                                Ren Mx | WWF México
                                <br>
                                <a href="https://www.wwf.org.mx/">
                                    https://www.wwf.org.mx/
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </td>
            <td align="center">
                <div style="margin-left:-55px; margin-right:55px;">
                    <p style="text-align: center; font-weight: bold;">EL SISTEMA FOTOVOLTAICO PRESENTADO EN ESTA PROPUESTA, EQUIVALE A <strong style="color:#082567;">{{ $power["objImpactoAmbiental"]["numeroArboles"] }}</strong> ÁRBOLES PLANTADOS AL AÑO.</p>
                    <img width="25%" height="130px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/tree.png'))) }}"/>
                </div>
            </td>
        </tr>
    </table>
    <div class="footer-page"></div>
</div>
<!-- Fin pagina 2 -->
<!-- Pagina 3 - Agregados -->
@if(!is_null($agregados["_agregados"]))
    <hr class="salto-pagina">

    <!-- HeaderPage -->
    <table>
        <tr>
            <td>
                <!-- LogoTipo Etesla -->
                <img id="logoTipoEtesla"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}">
            </td>
            <td>
                <h1 style="font-size:35px; margin-left: 425px;">Agregados</h1>
            </td>
        </tr>
    </table>

    <!-- Tabla de agregados -->
    <table class="table-agregados">
        <thead>
        <tr>
            <th>Agregado</th>
            <th>Cantidad</th>
            <th>Precio unit.</th>
        </tr>
        </thead>
        <tbody>
        @foreach($agregados["_agregados"] as $agregado)
            <tr>
                <td>{{ $agregado["nombreAgregado"] }}</td>
                <td>{{ $agregado["cantidadAgregado"] }}</td>
                <td>$ {{ $agregado["precioUnitarioMXN"] }} MXN</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td><strong>Costo total</strong></td>
            <td>$ {{ $agregados["costoTotal"] * $tipoDeCambio }} MXN</td>
        </tr>
        </tbody>
    </table>
@endif
<!-- Fin pagina 3 -->
</body>
</html>
