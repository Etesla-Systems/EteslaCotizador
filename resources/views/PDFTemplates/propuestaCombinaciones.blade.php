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
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 19px;
        background-color: #4474C2;
    }

    /* Contenedores */
    .container-fluid {
        padding: 0 !important;
    }

    .container-table {
        margin-top: -30px;
        margin-left: 25px;
        margin-right: 20px;
    }

    .div-contenedor {
        margin-left: 40px;
        margin-right: 40px;
        margin-top: 7px;
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
        margin-top: -290px;
        margin-left: 80px;
        border-radius: 15px;
        width: 390px;
        height: 290px;
        text-align: left;
    }

    /* Tablas */
    .table-costos-proyecto {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
        border-radius: 10px;
        border: 1px solid black;
        overflow: hidden;
    }

    .table-costos-proyecto thead {
        background-color: green;
        color: white;
        font-size: 16px;
        font-weight: bold;
    }

    .table-contenedor {
        width: 100%;
        border-collapse: collapse;
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

    /* Tab - Comparativa [Combinaciones] */
    .table-comparative {
        width: 100%;
        border-collapse: collapse;
        border-radius: 20px;
        overflow: hidden;
        text-align: center;
    }

    .table-comparative th, .table-comparative td {
        border: 2px solid #EFEFEF;
        width: 45%;
    }

    .title-tab-comparativa {
        font-size: 13px;
        font-weight: bolder;
    }

    .text-tab-comparativa {
        font-size: 12px;
    }

    .imgLogos {
        width: 100%;
        height: auto;
    }

    .divImgLogos {
        width: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: auto;
        margin-right: auto;
    }

    .recuadroInfo {
        /* Recuadro */
        width: 100%;
        border-style: ridge;
        text-align: justify;
        /* Texto */
        font-size: 12px;
    }

    /* Textos */
    .textIncProupesta {
        margin-left: 15px;
        line-height: 90%;
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

    .celda-costos {
        background-color: #7ab317;
        color: white;
        font-size: 16px;
        font-weight: bold;
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

<div class="container-fluid" style="border-top: 10px solid #4474C2;">
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
                <strong>Cliente: </strong>{{ $propuesta["cliente"]["vNombrePersona"] ." ". $propuesta["cliente"]["vPrimerApellido"] ." ". $propuesta["cliente"]["vSegundoApellido"] }}
            </p>
            <p id="direccionCliente" class="textIncProupesta">
                <strong>Direccion: </strong>{{ $propuesta["cliente"]["vCalle"] .", ". $propuesta["cliente"]["cCodigoPostal"] .", ". $propuesta["cliente"]["vCiudad"] ." ". $propuesta["cliente"]["vEstado"] }}
            </p>
            @if($propuesta["cliente"]["vEmail"] != "")
                <p id="email" class="textIncProupesta"><strong>Correo
                        electrónico: </strong>{{ $propuesta["cliente"]["vEmail"] }}</p>
            @endif
            @if($propuesta["cliente"]["vTelefono"] != "" || $propuesta["cliente"]["vCelular"] != "")
                <p id="telefono" class="textIncProupesta">
                    <strong>Contacto: </strong>{{ $propuesta["cliente"]["vTelefono"]  . "  /  " .  $propuesta["cliente"]["vCelular"] }}
                </p>
            @endif
            <p id="asesor" class="textIncProupesta">
                <strong>Asesor: </strong>{{ $propuesta["vendedor"]["vNombrePersona"] ." ". $propuesta["vendedor"]["vPrimerApellido"] ." ". $propuesta["vendedor"]["vSegundoApellido"] }}
            </p>
            <p id="sucursal" class="textIncProupesta">
                <strong>Sucursal: </strong>{{ $propuesta["vendedor"]["vOficina"] }}</p>
            <p id="caducidad-propuesta" style="margin-left:13px;"><strong>Validez de
                    <u>{{ $propuesta["expiracion"]["cantidad"] . " " . $propuesta["expiracion"]["unidadMedida"] }}</u></strong>
            </p>
        </div>
    </div>

    <div class="container-table">
        <h3>Paquete fotovoltaico de {{ $propuesta["paneles"]["potenciaReal"] }} kWp</h3>
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
            <tr id="desglocePanel" style="background-color:#F2F1F0;">
                <td style="text-align: center;">Panel</td>
                <td style="text-align: center;" id="marcaPanel">{{ $propuesta["paneles"]["vMarca"] }}</td>
                <td style="text-align: center;" id="cantidadPanel">{{ $propuesta["paneles"]["noModulos"] }}</td>
                <td style="text-align: center;" id="modeloPanel" style="font-size: 13px;">{{ $propuesta["paneles"]["nombre"] }}</td>
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td style="text-align: center;" id="costoTotalPanel">${{ number_format($propuesta["paneles"]["costoTotal"],2) }} USD</td>
                @else
                    <td style="text-align: center;" id="costoTotalPanel"></td>
                @endif
            </tr>
            <tr id="desgloceInversor">
                <td style="text-align: center;">Inversor</td>
                <td id="marcaInversor" style="text-align: center;">
                    {{ $propuesta["inversores"]["vMarca"] }}
                </td>
                @if($propuesta["inversores"]["combinacion"] === "true")
                    <td colspan="2" style="text-align: center;">
                        <p style="font-size:10px;">
                            {{ $propuesta["inversores"]["numeroDeInversores"]["MicroUno"]["vNombreMaterialFot"] }}
                            : {{ $inversores["numeroDeInversores"]["MicroUno"]["numeroDeInversores"] }}
                        </p>
                        <p style="font-size:10px;">
                            {{ $propuesta["inversores"]["numeroDeInversores"]["MicroDos"]["vNombreMaterialFot"] }}
                            : {{ $inversores["numeroDeInversores"]["MicroDos"]["numeroDeInversores"] }}
                        </p>
                    </td>
                @else
                    <td id="cantidadInversor" style="text-align: center;">
                        {{ $propuesta["inversores"]["numeroDeInversores"] }}
                    </td>
                    <td id="modeloInversor" style="font-size: 13px; text-align: center;">
                        {{ $propuesta["inversores"]["vNombreMaterialFot"] }}
                    </td>
                @endif
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td id="costoTotalInversor" style="text-align: center;">
                        ${{ number_format($propuesta["inversores"]["costoTotal"],2) }} USD
                    </td>
                @else
                    <td id="costoTotalInversor" style="text-align: center;"></td>
                @endif
            </tr>
            <tr id="desgloceEstructura" style="background-color:#F2F1F0;">
                <td style="text-align: center;">Estructura</td>
                <td id="marcaEstructura" style="text-align: center;">
                    {{ $propuesta["estructura"]["_estructuras"]["vMarca"] }}
                </td>
                <td id="cantidadEstructura" style="text-align: center;">
                    {{ $propuesta["estructura"]["cantidad"] }}
                </td>
                <td style="text-align: center;">Estructura de aluminio</td>
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td id="costoTotalEstructura" style="text-align: center;">${{ number_format($propuesta["estructura"]["costoTotal"],2) }}USD
                    </td>
                @else
                    <td id="costoTotalEstructura" style="text-align: center;"></td>
                @endif
            </tr>
            <tr>
                <td style="text-align: center;">Mano de obra</td>
                <td></td>
                <td></td>
                <td style="font-size:10px; text-align: center;">*Instalación *Servicio *Anclaje *Fijación</td>
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td id="costoTotalMO" style="text-align: center;">
                        ${{ number_format($propuesta["totales"]["manoDeObra"],2) }} USD
                    </td>
                @else
                    <td id="costoTotalMO" style="text-align: center;"></td>
                @endif
            </tr>
            <tr style="background-color:#F2F1F0;">
                <td style="text-align: center;">Otros</td>
                <td></td>
                <td></td>
                <td style="font-size:10px; text-align: center;">*Cableado *Protecciones *Tramite CFE *Monitoreo PostVenta (permanente)</td>
                @if($PdfConfig["subtotalesDesglozados"] === "true")
                    <td id="costoTotalOtros" style="text-align: center;">
                        ${{ number_format($propuesta["totales"]["otrosTotal"],2) }} USD
                    </td>
                @else
                    <td id="costoTotalOtros" style="text-align: center;"></td>
                @endif
            </tr>
            <tr>
                <td></td>
                <td></td>
                @if($propuesta["descuento"]["porcentaje"] >= 1)
                    <td id="tdDescuento" style="background-color:green; text-align: center;">
                        <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                            Descuento ({{ $propuesta["descuento"]["porcentaje"] }}%)
                        </p>
                    </td>
                @else
                    <td></td>
                @endif
                <td align="center" style="text-align: center;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/USA_1.png'))) }}" class="banderas margins"/>
                </td>
                <td align="center" style="text-align: center;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/MEX_1.png'))) }}" class="banderas margins"/>
                </td>
            </tr>
            <tr style="background-color: #E8E8E8;">
                <td style="text-align: center;"><strong>Subtotal</strong></td>
                <td></td>
                @if($propuesta["descuento"]["porcentaje"] > 0)
                    <td id="descuentoUSD"
                        style="border-right:solid green; border-left:solid green; border-bottom:solid green; text-align: center;">
                        <p style="font-weight:bolder; text-align:center; font-size:15px; background-color:#FFF66D;">
                            ${{ number_format($propuesta["descuento"]["descuento"],2) }} USD
                        </p>
                    </td>
                @else
                    <td></td>
                @endif
                <td id="subtotalSinIVAUSD" align="center" style="text-align: center;">
                    ${{ number_format($propuesta["totales"]["precio"],2) }} USD
                </td>
                <td id="subtotalSinIVAMXN" align="center" style="text-align: center;">
                    ${{ number_format($propuesta["totales"]["precioMXNSinIVA"],2) }} MXN
                </td>
            </tr>
            <tr style="background-color: #E8E8E8;">
                <td style="text-align: center;"><strong>Total</strong></td>
                <td></td>
                <td></td>
                <td id="totalConIVAUSD" align="center" style="text-align: center;">
                    ${{ number_format($propuesta["totales"]["precioMasIVA"],2) }} USD
                </td>
                <td id="totalConIVAMXN" align="center" style="text-align: center;">
                    ${{ number_format($propuesta["totales"]["precioMXNConIVA"],2) }} MXN
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
        <p class="nota"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong
                style="color: #2E2D2D;">(${{ $propuesta["tipoDeCambio"] }} mxn)</strong> se tomará el reportado por
            Banorte a la Venta del día en que se realice cada pago. Se requiere 50% de anticipo a la aprobación del
            proyecto, 35% a la recepción de los equipos y 15% una vez culminada la instalación. Los documentos para
            trámite CFE se entregan para firma el día que se realiza el finiquito del proyecto.</p>
    </div>

    <table class="table-contenedor" style="margin-left: auto; margin-right: auto;">
        <tr>
            <td id="imgLogoPanel" align="center" style="border: none; width: 110px; height: 90px;">
                @php($image = $propuesta['paneles']['vMarca'] . '.png')
                <img style="width: 90%;  height: auto;"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
            </td>
            <td id="imgLogoInversor" align="center" style="border: none; width: 110px; height: 90px;">
                @php($image = $propuesta['inversores']['vMarca'] . '.png')
                <img style="width: 90%;  height: auto;"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
            </td>
            <td id="imgLogoInversor" align="center" style="border: none; width: 110px; height: 90px;">
                @php($image = $propuesta['estructura']['_estructuras']['vMarca'] . '.png')
                <img style="width: 90%;  height: auto;"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
            </td>
        </tr>
    </table>

    <hr class="linea-division" style="background-color:#4474C2;">

    <table class="table-contenedor">
        <tr>

            <td align="center">

                <div style="margin-left:30px;">
                    <div class="card">

                        <div class="card-header">
                            <p style="color:#FFFFFF; margin-top:-6px; font-weight:bolder;">
                                Total a pagar del periodo facturado
                            </p>
                        </div>
                        <div class="card-body">
                            <p style="font-weight:bolder; text-align:center; margin-top:10px; font-size:29px;">
                                ${{ number_format($propuesta["power"]["objConsumoEnPesos"]["pagoPromedioBimestralConIva"], 2) }}
                            </p>
                            <hr class="linea-division"
                                style="background-color:#7ab317; margin-top:-17px; margin-left:-20px; margin-right:-20px; height:15px;">
                            <img height="19px" width="19px" style="margin-top:2px; margin-left:-170px;"
                                 src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                            <p style="font-size:14px; text-align:center; margin-top:-10px;">
                                Pago actual s/paneles
                            </p>
                            <img height="19px" width="19px" style="margin-left:170px; margin-top:-30px;"
                                 src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                            <hr class="linea-division"
                                style="background-color:#7ab317; margin-top:-5px; margin-left:-20px; margin-right:-20px; height:15px;">
                            <p style="font-weight:bolder; margin-top:25px; font-size:19px;">
                                {{ number_format($propuesta["power"]["_consumos"]["_promCons"]["promConsumosBimestrales"]) }}
                                Kw
                            </p>
                            <p style="font-size:9px; background-color:#F7FB0C; font-weight:bolder; margin-top:-12px; text-align:center;">
                                ({{ $propuesta["power"]["old_dac_o_nodac"] }})
                            </p>
                        </div>
                    </div>
                </div>
            </td>
            <td align="center">

                <div style="margin-left:-80px;">
                    <div class="card">

                        <div class="card-header">
                            <p style="color:#FFFFFF; margin-top:-6px; font-weight:bolder;">
                                Total a pagar del periodo facturado
                            </p>
                        </div>
                        <div class="card-body">
                            <p style="font-weight:bolder; text-align:center; margin-top:10px; font-size:29px;">
                                ${{ number_format($propuesta["power"]["objGeneracionEnpesos"]["pagoPromedioBimestralConIva"] ,2) }}
                            </p>
                            <hr class="linea-division"
                                style="background-color:#7ab317; margin-top:-17px; margin-left:-20px; margin-right:-20px; height:15px;">
                            <img height="19px" width="19px" style="margin-top:2px; margin-left:-170px;"
                                 src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                            <p style="font-size:14px; text-align:center; margin-top:-10px;">
                                Pago actual c/paneles
                            </p>
                            <img height="19px" width="19px" style="margin-left:170px; margin-top:-30px;"
                                 src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/flecha.png'))) }}"/>
                            <hr class="linea-division"
                                style="background-color:#7ab317; margin-top:-5px; margin-left:-20px; margin-right:-20px; height:15px;">
                            <p style="font-weight:bolder; text-align:center; margin-top:25px; font-size:19px;">
                                {{ number_format($propuesta["power"]["nuevosConsumos"]["promedioNuevoConsumoBimestral"],2) }}
                                Kw
                            </p>
                            <p style="font-size:9px; background-color:#F7FB0C; font-weight:bolder; margin-top:-12px; text-align:center;">
                                ( {{ $propuesta["power"]["new_dac_o_nodac"] }} )
                            </p>
                        </div>
                    </div>
                </div>
            </td>
            <td align="center">

                <div style="margin-right:20px;">
                    <img height="32px" width="32px" style="margin-top:15px; margin-left:-30px;"
                         src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/generation-sun-electricity.png'))) }}"/>
                    <h3 style="margin-left:-50px;">Generación bimestral promedio:</h3>
                    <h2 style="color:#082567; margin-left:-50px;">{{ $propuesta["power"]["generacion"]["promeDGeneracionBimestral"] }}
                        kWh</h2>
                </div>
            </td>
        </tr>
    </table>
    <div class="footer-page"></div>
</div>

<hr class="salto-pagina">


<div class="container-fluid">
    <table>
        <tr>
            <td>
                <img id="logoTipoEtesla"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}">
            </td>
            <td>
                <h1 style="font-size:25px;">
                    COMPARATIVA DE PROPUESTAS
                </h1>
            </td>
        </tr>
    </table>
    <div id="comparativas-combinaciones" class="div-contenedor">

        <table class="table-comparative">
            <thead style="color:#FFFFFF;">
            <tr>
                <th id="td-invisible"
                    style="border-left:0px; border-top:0px; border-bottom:0px;text-align: center; background-color:#FFFFFF"></th>
                <th scope="col" style="background-color:#112B3C; text-align: center;">
                    @if($propuestaSeleccionada === "combinacionEconomica")
                        <img height="29x" width="29x"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/estrella.png'))) }}"
                             style="margin-top:3px; margin-left:-10px;"/>
                    @endif
                    <strong class="title-tab-comparativa">Economica</strong>
                </th>
                <th scope="col" style="background-color:#205375; text-align: center;">
                    @if($propuestaSeleccionada === "combinacionMediana")
                        <img height="29x" width="29x"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/estrella.png'))) }}"
                             style="margin-top:3px; margin-left:-10px;"/>
                    @endif
                    <strong class="title-tab-comparativa">Recomendada</strong>
                </th>
                <th scope="col" style="background-color:#F66B0E; text-align: center;">
                    @if($propuestaSeleccionada === "combinacionOptima")
                        <img height="29x" width="29x"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/estrella.png'))) }}"
                             style="margin-top:3px; margin-left:-10px;"/>
                    @endif
                    <strong class="title-tab-comparativa">Premium</strong>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Potencia instalada
                </td>
                <td id="tdPotenciaInstaladaA" class="text-tab-comparativa" style="text-align: center;">
                    {{ number_format($combinacionEconomica["paneles"]["potenciaReal"],2) }} Kw
                </td>
                <td id="tdPotenciaInstaladaB" class="text-tab-comparativa" style="text-align: center;">
                    {{ number_format($combinacionMediana["paneles"]["potenciaReal"],2) }} Kw
                </td>
                <td id="tdPotenciaInstaladaC" class="text-tab-comparativa" style="text-align: center;">
                    {{ number_format($combinacionOptima["paneles"]["potenciaReal"],2) }} Kw
                </td>
            </tr>
            </tbody>
        </table>
        <table id="panel" class="table-comparative" style="margin-top:20px; width: 100%;">
            <tr>
                <td id="td-invisible"
                    style="border-left:0px; border-top:0px; border-bottom:0px; text-align: center; background-color:#FFFFFF"></td>
                <td id="tdPropuestaA" style="background-color:#112B3C; text-align: center; font-weight:bolder; color:#FFFFFF;">Panel</td>
                <td id="tdPropuestaB" style="background-color:#205375; text-align: center; font-weight:bolder; color:#FFFFFF;">Panel</td>
                <td id="tdPropuestaC" style="background-color:#F66B0E; text-align: center; font-weight:bolder; color:#FFFFFF;">Panel</td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Marca
                </td>
                <td id="tdMarcaPanelA" style="text-align: center;">
                    <div class="divImgLogos">
                        @php($image = $combinacionEconomica["paneles"]["marca"] . '.png')
                        <img id="imgPanelA" class="imgLogos"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
                    </div>
                </td>
                <td id="tdMarcaPanelB" style="text-align: center;">
                    <div class="divImgLogos">
                        @php($image = $combinacionMediana["paneles"]["marca"] . '.png')
                        <img id="imgPanelB" class="imgLogos"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
                    </div>
                </td>
                <td id="tdMarcaPanelC" style="text-align: center;">
                    <div class="divImgLogos">
                        @php($image = $combinacionOptima["paneles"]["marca"] . '.png')
                        <img id="imgPanelC" class="imgLogos"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Modelo
                </td>
                <td id="tdModeloPanelA" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionEconomica["paneles"]["nombre"] }}
                </td>
                <td id="tdModeloPanelB" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionMediana["paneles"]["nombre"] }}
                </td>
                <td id="tdModeloPanelC" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionOptima["paneles"]["nombre"] }}
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Cantidad
                </td>
                <td id="tdCantidadPanelA" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionEconomica["paneles"]["noModulos"] }}
                </td>
                <td id="tdCantidadPanelB" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionMediana["paneles"]["noModulos"] }}
                </td>
                <td id="tdCantidadPanelC" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionOptima["paneles"]["noModulos"] }}
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Origen
                </td>
                <td id="tdOrigenPanelA" style="text-align: center;">
                    @php($image = $combinacionEconomica['paneles']['origen'] . '.png')
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                </td>
                <td id="tdOrigenPanelB" style="text-align: center;">
                    @php($image = $combinacionMediana['paneles']['origen'] . '.png')
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                </td>
                <td id="tdOrigenPanelC" style="text-align: center;">
                    @php($image = $combinacionOptima['paneles']['origen'] . '.png')
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                </td>
            </tr>
        </table>
        <table id="inversor" class="table-comparative" style="margin-top:20px;">
            <tr>
                <td id="td-invisible"
                    style="border-left:0px; text-align: center; border-top:0px; border-bottom:0px; background-color:#FFFFFF"></td>
                <td id="tdPropuestaA" style="background-color:#112B3C; text-align: center; font-weight:bolder; color:#FFFFFF;">Inversor</td>
                <td id="tdPropuestaB" style="background-color:#205375; text-align: center; font-weight:bolder; color:#FFFFFF;">Inversor</td>
                <td id="tdPropuestaC" style="background-color:#F66B0E; text-align: center; font-weight:bolder; color:#FFFFFF;">Inversor</td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Marca
                </td>
                <td id="tdMarcaInversorA" style="text-align: center;">
                    <div class="divImgLogos">
                        @php($image = $combinacionEconomica["inversores"]["marca"] . '.png')
                        <img id="imgInversorA" class="imgLogos"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
                    </div>
                </td>
                <td id="tdMarcaInversorB" style="text-align: center;">
                    <div class="divImgLogos">
                        @php($image = $combinacionMediana["inversores"]["marca"] . '.png')
                        <img id="imgInversorB" class="imgLogos"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
                    </div>
                </td>
                <td id="tdMarcaInversorC" style="text-align: center;">
                    <div class="divImgLogos">
                        @php($image = $combinacionOptima["inversores"]["marca"] . '.png')
                        <img id="imgInversorC" class="imgLogos"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Modelo
                </td>
                <td id="tdModeloInversorA" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionEconomica["inversores"]["vNombreMaterialFot"] }}
                </td>
                <td id="tdModeloInversorB" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionMediana["inversores"]["vNombreMaterialFot"] }}
                </td>
                <td id="tdModeloInversorC" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionOptima["inversores"]["vNombreMaterialFot"] }}
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Cantidad
                </td>
                <td id="tdCantidadInversorA" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionEconomica["inversores"]["numeroDeInversores"] }}
                </td>
                <td id="tdCantidadInversorB" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionMediana["inversores"]["numeroDeInversores"] }}
                </td>
                <td id="tdCantidadInversorC" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionOptima["inversores"]["numeroDeInversores"] }}
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Potencia
                </td>
                <td id="tdPotenciaInversorA" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionEconomica["inversores"]["fPotencia"] }} W
                </td>
                <td id="tdPotenciaInversorB" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionMediana["inversores"]["fPotencia"] }} W
                </td>
                <td id="tdPotenciaInversorC" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionOptima["inversores"]["fPotencia"] }} W
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Origen
                </td>
                <td id="tdOrigenInversorA" style="text-align: center;">
                    @php($image = $combinacionEconomica['inversores']['origen'] . '.png')
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                </td>
                <td id="tdOrigenInversorB" style="text-align: center;">
                    @php($image = $combinacionMediana['inversores']['origen'] . '.png')
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                </td>
                <td id="tdOrigenInversorC" style="text-align: center;">
                    @php($image = $combinacionOptima['inversores']['origen'] . '.png')
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                </td>
            </tr>
        </table>
        <table id="estructura" class="table-comparative" style="margin-top:20px;">
            <tr>
                <td id="td-invisible"
                    style="border-left:0px; border-top:0px; text-align: center; border-bottom:0px; background-color:#FFFFFF"></td>
                <td id="tdPropuestaA" style="background-color:#112B3C; text-align: center; font-weight:bolder; color:#FFFFFF;">Estructura
                </td>
                <td id="tdPropuestaB" style="background-color:#205375; text-align: center; font-weight:bolder; color:#FFFFFF;">Estructura
                </td>
                <td id="tdPropuestaC" style="background-color:#F66B0E; text-align: center; font-weight:bolder; color:#FFFFFF;">Estructura
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Marca
                </td>
                <td id="tdMarcaEstructuraA" style="text-align: center;">
                    <div class="divImgLogos">
                        @php($image = $combinacionEconomica['estructura']['marca'] . '.png')
                        <img id="imgEstructuraA" class="imgLogos"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
                    </div>
                </td>
                <td id="tdMarcaEstructuraB" style="text-align: center;">
                    <div class="divImgLogos">
                        @php($image = $combinacionMediana['estructura']['marca'] . '.png')
                        <img id="imgEstructuraB" class="imgLogos"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
                    </div>
                </td>
                <td id="tdMarcaEstructuraC" style="text-align: center;">
                    <div class="divImgLogos">
                        @php($image = $combinacionOptima['estructura']['marca'] . '.png')
                        <img id="imgEstructuraC" class="imgLogos"
                             src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Modelo
                </td>
                <td id="tdModeloEstructuraA" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionEconomica["estructura"]["marca"] }}
                </td>
                <td id="tdModeloEstructuraB" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionMediana["estructura"]["marca"] }}
                </td>
                <td id="tdModeloEstructuraC" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionOptima["estructura"]["marca"] }}
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Cantidad
                </td>
                <td id="tdCantidadEstructuraA" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionEconomica["estructura"]["cantidad"] }}
                </td>
                <td id="tdCantidadEstructuraB" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionMediana["estructura"]["cantidad"] }}
                </td>
                <td id="tdCantidadEstructuraC" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionOptima["estructura"]["cantidad"] }}
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Origen
                </td>
                <td id="tdOrigenEstructuraA" style="text-align: center;">
                    @php($image = $combinacionEconomica['estructura']['origen'] . '.png')
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                </td>
                <td id="tdOrigenEstructuraB" style="text-align: center;">
                    @php($image = $combinacionMediana['estructura']['origen'] . '.png')
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                </td>
                <td id="tdOrigenEstructuraC" style="text-align: center;">
                    @php($image = $combinacionOptima['estructura']['origen'] . '.png')
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/' . $image))) }}">
                </td>
            </tr>
        </table>
        <table id="ahorro" class="table-comparative" style="margin-top:20px;">
            <tr>
                <td id="td-invisible"
                    style="border-left:0px; text-align: center; border-top:0px; border-bottom:0px; background-color:#FFFFFF"></td>
                <td id="tdPropuestaA" style="background-color:#112B3C; text-align: center; font-weight:bolder; color:#FFFFFF;">Ahorro</td>
                <td id="tdPropuestaB" style="background-color:#205375; text-align: center; font-weight:bolder; color:#FFFFFF;">Ahorro</td>
                <td id="tdPropuestaC" style="background-color:#F66B0E; text-align: center; font-weight:bolder; color:#FFFFFF;">Ahorro</td>
            </tr>
            <tr>
                <td colspan="4" class="text-tab-comparativa" style="text-align: center;">
                    <strong class="title-tab-comparativa">Consumo sin Paneles</strong>
                    {{ number_format($propuesta["promedioConsumosBimestrales"],2) }} kw |
                    ${{ number_format($propuesta["power"]["objConsumoEnPesos"]["pagoPromedioBimestral"],2) }} MXN
                    <strong class="title-tab-comparativa">[ Bimestrales ]</strong>
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    % de generacion
                </td>
                <td id="tdPorcentajePropuestaA" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionEconomica["power"]["porcentajePotencia"] }}%
                </td>
                <td id="tdPorcentajePropuestaB" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionMediana["power"]["porcentajePotencia"] }}%
                </td>
                <td id="tdPorcentajePropuestaC" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionOptima["power"]["porcentajePotencia"] }}%
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Nuevo consumo energetico
                </td>
                <td id="tdNewConsumoEnergeticoA" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionEconomica["power"]["nuevosConsumos"]["promedioNuevoConsumoBimestral"] }} Kw/bim
                </td>
                <td id="tdNewConsumoEnergeticoB" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionMediana["power"]["nuevosConsumos"]["promedioNuevoConsumoBimestral"] }} Kw/bim
                </td>
                <td id="tdNewConsumoEnergeticoC" class="text-tab-comparativa" style="text-align: center;">
                    {{ $combinacionOptima["power"]["nuevosConsumos"]["promedioNuevoConsumoBimestral"] }} Kw/bim
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Nuevo pago de luz
                </td>
                <td id="tdNewConsumoEconomicoA" class="text-tab-comparativa" style="text-align: center;">
                    ${{ number_format($combinacionEconomica["power"]["objGeneracionEnpesos"]["pagoPromedioBimestralConIva"],2) }}
                    MXN / bim
                </td>
                <td id="tdNewConsumoEconomicoB" class="text-tab-comparativa" style="text-align: center;">
                    ${{ number_format($combinacionMediana["power"]["objGeneracionEnpesos"]["pagoPromedioBimestralConIva"],2) }}
                    MXN / bim
                </td>
                <td id="tdNewConsumoEconomicoC" class="text-tab-comparativa" style="text-align: center;">
                    ${{ number_format($combinacionOptima["power"]["objGeneracionEnpesos"]["pagoPromedioBimestralConIva"],2) }}
                    MXN / bim
                </td>
            </tr>
        </table>
        <table id="totales" class="table-comparative" style="margin-top:20px;">
            <tr>
                <td id="td-invisible"
                    style="border-left:0px; border-top:0px; text-align: center; border-bottom:0px; background-color:#FFFFFF"></td>
                <td id="tdPropuestaA" style="background-color:#112B3C; text-align: center; font-weight:bolder; color:#FFFFFF;">Totales</td>
                <td id="tdPropuestaB" style="background-color:#205375; text-align: center; font-weight:bolder; color:#FFFFFF;">Totales</td>
                <td id="tdPropuestaC" style="background-color:#F66B0E; text-align: center; font-weight:bolder; color:#FFFFFF;">Totales</td>
            </tr>
            @if($propuesta["descuento"]["porcentaje"] > 0)
                <tr>
                    <td class="title-tab-comparativa" style="background-color:#2593F0; color:white; text-align: center;">
                        Total s/Descuento
                    </td>
                    <td id="tdCostoSinDescuentoA" class="text-tab-comparativa"
                        style="background-color:#2593F0; text-align: center; color:white;">
                        ${{ number_format($combinacionEconomica["descuento"]["precioSinDescuento"],2) }} USD
                    </td>
                    <td id="tdCostoSinDescuentoB" class="text-tab-comparativa"
                        style="background-color:#2593F0; text-align: center; color:white;">
                        ${{ number_format($combinacionMediana["descuento"]["precioSinDescuento"],2) }} USD
                    </td>
                    <td id="tdCostoSinDescuentoC" class="text-tab-comparativa"
                        style="background-color:#2593F0; text-align: center; color:white;">
                        ${{ number_format($combinacionOptima["descuento"]["precioSinDescuento"],2) }} USD
                    </td>
                </tr>
                <tr>
                    <td class="title-tab-comparativa" style="background-color:green; text-align: center; color:white;">
                        Descuento (<strong>{{ $propuesta["descuento"]["porcentaje"] }}%</strong>)
                    </td>
                    <td id="tdDescuentoA" class="text-tab-comparativa" style="background-color:green; text-align: center; color:white;">
                        ${{ number_format($combinacionEconomica["descuento"]["descuento"],2) }} USD
                    </td>
                    <td id="tdDescuentoB" class="text-tab-comparativa" style="background-color:green; text-align: center; color:white;">
                        ${{ number_format($combinacionMediana["descuento"]["descuento"],2) }} USD
                    </td>
                    <td id="tdDescuentoC" class="text-tab-comparativa" style="background-color:green; text-align: center; color:white;">
                        ${{ number_format($combinacionOptima["descuento"]["descuento"],2) }} USD
                    </td>
                </tr>
            @endif
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Total s/IVA
                </td>
                <td id="tdSubtotalA" class="text-tab-comparativa" style="text-align: center;">
                    ${{ number_format($combinacionEconomica["totales"]["precio"],2) }} USD
                </td>
                <td id="tdSubtotalB" class="text-tab-comparativa" style="text-align: center;">
                    ${{ number_format($combinacionMediana["totales"]["precio"],2) }} USD
                </td>
                <td id="tdSubtotalC" class="text-tab-comparativa" style="text-align: center;">
                    ${{ number_format($combinacionOptima["totales"]["precio"],2) }} USD
                </td>
            </tr>
            <tr>
                <td class="title-tab-comparativa" style="text-align: center;">
                    Total c/IVA
                </td>
                <td id="tdTotalA" class="text-tab-comparativa" style="text-align: center;">
                    ${{ number_format($combinacionEconomica["totales"]["precioMasIVA"],2) }} USD
                </td>
                <td id="tdTotalB" class="text-tab-comparativa" style="text-align: center;">
                    ${{ number_format($combinacionMediana["totales"]["precioMasIVA"],2) }} USD
                </td>
                <td id="tdTotalC" class="text-tab-comparativa" style="text-align: center;">
                    ${{ number_format($combinacionOptima["totales"]["precioMasIVA"],2) }} USD
                </td>
            </tr>
        </table>


        <table id="nota-costo-watt" class="table-comparative" style="margin-top:25px;">
            <tr>
                <td style="background-color:#9AC5E7; text-align: center;">
                    <p style="font-size:11px; font-weight:bold;">NOTA IMPORTANTE</p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <p style="font-size:9px;">
                        Entre los costos, lo más importante a revisar es el <strong style="background-color:#ECFF00;">costo
                            por watt</strong> del proyecto, pues va en función del costo del proyecto y la potencia
                        instalada. Puede ser que un proyecto se note económico pero es posible que estén proponiendo
                        menos potencia y por ende la cotización a comparar no tenga equivalente.
                    </p>
                </td>
            </tr>
        </table>

    </div>
    <div class="footer-page"></div>
</div>

<hr class="salto-pagina">


<div class="container-fluid" style="border-top: 10px solid #5576F2;">
    <table>
        <tr>
            <td>
                <img id="logoTipoEtesla"
                     src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}">
            </td>
            <td style="padding-left: 75px;">
                <h1 style="font-size:25px; text-align:right; margin-right: 27px;">FINANCIAMIENTO Y RETORNO DE
                    INVERSIÓN</h1>
            </td>
        </tr>
    </table>

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
                                <p style="font-size:14px; margin-left:6px; margin-right:6px;">Pago de contado</p>
                            </th>
                            <td style="background-color:#4474C2;">
                                <p style="font-size:14px; margin-left:6px; margin-right:6px;">
                                    ${{ number_format($propuesta["totales"]["precioMXNConIVA"], 2) }}
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
                                    ${{ number_format($propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"] ,2) }}
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
                                <p style="font-size:18px; margin-left:6px; margin-right:6px; font-weight:bolder;">
                                    {{ $propuesta["roi"]["roiEnAnios"] }} año(s)
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
                    ${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["tresMeses"] ,2) }}</td>
                <td>
                    ${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["seisMeses"], 2) }}</td>
                <td>
                    ${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["nueveMeses"], 2) }}</td>
                <td>
                    ${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["doceMeses"], 2) }}</td>
                <td>
                    ${{ number_format($propuesta["financiamiento"]["objMensualidadesCreditCard"]["dieciochoMeses"], 2) }}</td>
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
                <td>${{ number_format($propuesta["financiamiento"]["objEnganche"]["quincePorcent"], 2) }}</td>
                <td>${{ number_format($propuesta["financiamiento"]["objEnganche"]["treintacincoPorcent"], 2) }}</td>
                <td>${{ number_format($propuesta["financiamiento"]["objEnganche"]["cincuentaPorcent"], 2) }}</td>
            </tr>
        </table>
        <p class="nota" style="text-align:left; margin-left:20px;">
            <strong>NOTA: </strong>
            Esa tabla de financiamiento es de referencia y puede variar en funcion de las condiciones de la financiera.
        </p>
        <table id="tabFinanciamient" class="tabFinanciamiento">
            <tr>
                <th>Pagos mensuales</br> por plazo</th>
                <th style="background-color: #4474C2;">15%</th>
                <th style="background-color: #4474C2;">35%</th>
                <th style="background-color: #4474C2;">50%</th>
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

                        @if($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent] > $propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"] && $propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent] < ($propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"] * 1.10))
                            <td id="amarillo" style="background-color:#FAE610">
                                ${{ number_format($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                            </td>
                        @elseif($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent] <= $propuesta["roi"]["ahorro"]["ahorroMensualEnPesosMXN"])
                            <td id="verde" style="background-color:#44C331">
                                ${{ number_format($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                            </td>
                        @else
                            <td id="normal" style="background-color:#808D99">
                                ${{ number_format($propuesta["financiamiento"]["_pagosMensualesPorPlazo"][$x][$porcent], 2) }}
                            </td>
                        @endif
                    @endfor
                </tr>
            @endfor
        </table>

    </div>


    <hr class="linea-division" style="background-color:#5576F2; margin-left:-15px; margin-right:-15px;">

    <table id="tableGraficas">
        <tr>
            <td id="grfEnergetico">
                <img style="width:40%; height:210px; margin-left:55px;" src='{{ $Chart["chartEnergetico"] }}'/>
            </td>
            <td id="grfEconomico">
                <img style="width:40%; height:210px; margin-left:85px;" src='{{ $Chart["chartEconomico"] }}'/>
            </td>
        </tr>
    </table>


    <table>
        <tr>
            <td style="width: 450px;">
                <p style="margin-top: 10px; margin-left: 55px; text-align: left; font-weight: bold;">Somos una empresa
                    avalada por:</p>
                <div style="margin-top:10px;">
                    <div name="ANCE">
                        <div style="margin-left:55px; height:68px; width:60px">
                            <img style="width:100%; height:auto;"
                                 src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/ance.jpg'))) }}">
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
                            <img style="width:100%; height:auto;"
                                 src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/wwf.jpg'))) }}">
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
                    <p style="text-align: center; font-weight: bold;">EL SISTEMA FOTOVOLTAICO PRESENTADO EN ESTA
                        PROPUESTA, EQUIVALE A <strong
                            style="color:#082567;">{{ $propuesta["power"]["objImpactoAmbiental"]["numeroArboles"] }}</strong>
                        ÁRBOLES PLANTADOS AL AÑO.</p>
                    <img width="25%" height="130px"
                         src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/complementos/tree.png'))) }}"/>
                </div>
            </td>
        </tr>
    </table>

    <div class="footer-page"></div>
</div>
</body>
</html>
