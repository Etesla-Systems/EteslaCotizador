<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
</head>
<style type="text/css">
    /* --------------- ---------------------- */
    *{
        font-family: "Calibri, sans-serif";
    }
    html{
        margin: 0;
    }
    .footer-page{
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 19px;
        background-color: #5FC055;
    }

    /* Contenedores */
    .container-fluid{
        padding: 0 !important;
    }
    .container-table{
        margin-top: -20px;
        margin-left: 25px;
        margin-right: 20px;
    }

    /* Salto de pagina [hr] */
    hr.salto-pagina{
        page-break-after: always;
        border: 0;
        margin: 0;
        padding: 0;
    }
    hr.linea-division{
        height: 6.5px;
        border-style: none;
    }

    /* --------------- ---------------------- */

    /* Contenido hoja */
    #logoTipoEtesla{
        width: 22%;
    }

    #recuadroPaneles{
        width:100%;
        height: 315px;
        background-repeat: no-repeat;
        margin-left: 80px;
        border-radius: 15px;
    }

    #recuadroFlotante{
        background-color: white;
        margin-top: -260px;
        margin-left: 80px;
        border-radius: 15px;
        width: 360px;
        height: 260px;
        text-align: left;
    }

    /* Tablas */
    .table-costos-proyecto{
        width: 100%;
        text-align: center;
        border-collapse: collapse;
        border-radius: 10px;
        border: 1px solid black;
        overflow: hidden;
    }
    .table-costos-proyecto thead{
        background-color: green;
        color: white;
        font-size: 16px;
        font-weight: bold;
    }

    .table-agregados{
        width: 100%;
        text-align: center;
        border: 1px solid black;
        border-collapse: collapse;
        margin-top:25px;
        margin-left:25px;
        margin-right:25px;
    }
    .table-agregados td{
        border: 1px solid black;
    }

    .table-contenedor{
        width: 100%;
        border-collapse: collapse;
    }
    /* Tab - Financiamiento */
    .tabFinanciamiento{
        width: 100%;
        color: #fff;
        background-color: #3A565E;
        border-collapse: collapse;
        border-radius: 20px;
        overflow: hidden;
    }
    .tabFinanciamiento th, .tabFinanciamiento td{
        border: 3px solid white;
        color: white;
        text-align: center;
    }

    /* Textos */
    .textIncProupesta{
        margin-left: 15px;
        line-height: 75%;
    }
    .text-inferior-pag1{
        font-size: 11px;
        font-weight: bolder;
    }
    .text-inferior-pag1-secundary{
        font-size: 10px;
    }

    /* Cards */
    .card{
        margin-top: 3px;
        width: 175px;
        padding: 20px;
        border-radius: 20px;
    }
    .card-header{
        background: rgb(52, 181, 69);
        color: rgb(255, 255, 255);
        margin: -20px;
        padding: 10px;
        font-size: 10px;
        height: 10px;
        text-align: center;
    }
    .card-body{
        margin: -20px;
        padding: 20px;
        font-size: 18px;
        line-height: 20%;

        border-top: none;
        border-left: 1px solid #D9D9D9;
        border-right: 1px solid #D9D9D9;
        border-bottom: 1px solid #D9D9D9;
    }
    .rectangulo-into-card{
        border-style: groove;
        border: 1px solid;
        width: 160px;
        height: 100px;
        margin-left: 10px;
    }
</style>
<body>
<!-- Page 1 -->
<div class="container-fluid" style="border-top: 10px solid #5576F2;">
    <table>
        <tr>
            <td>
                <!-- LogoTipo Etesla -->
                <img id="logoTipoEtesla" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}">
            </td>
            <td>
                <h1 style="font-size:25px; text-align:right; margin-right: 27px;">SISTEMA FOTOVOLTAICO INTERCONECTADO A LA RED DE CFE</h1>
            </td>
        </tr>
    </table>
    <img id="recuadroPaneles" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/Paneles-solares-tesla.jpg'))) }}"/>
    <div id="recuadroFlotante">
        <div>
            <p id="fechaCreacion" class="textIncProupesta"><strong>Fecha de creacion: {{ date('Y-m-d') }}</strong></p>
            <p id="nombreCliente" class="textIncProupesta"><strong>Cliente: </strong>{{ $cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"] }}</p>
            <p id="direccionCliente" class="textIncProupesta"><strong>Direccion: </strong>{{ $cliente["vCalle"] ." ". $cliente["vMunicipio"] ." ". $cliente["vEstado"] }}</p>
            @if($cliente["vEmail"] != "")
                <p id="email" class="textIncProupesta"><strong>Correo electrónico: </strong>{{ $cliente["vEmail"] }}</p>
            @endif
            @if($cliente["vTelefono"] != "" || $cliente["vCelular"] != "")
                <p id="telefono" class="textIncProupesta"><strong>Contacto: </strong>{{ $cliente["vTelefono"]  . "  /  " .  $cliente["vCelular"] }}</p>
            @endif
            <p id="asesor" class="textIncProupesta"><strong>Asesor:</strong> {{ $vendedor["vNombrePersona"] ." ". $vendedor["vPrimerApellido"] ." ". $vendedor["vSegundoApellido"] }}</p>
            <p id="sucursal" class="textIncProupesta"><strong>Sucursal: </strong>{{ $vendedor["vOficina"] }}</p>
            <p id="caducidad-propuesta" style="margin-left:13px; margin-top:-7px;"><strong>Validez de <u>{{ $expiracion["cantidad"] . " " . $expiracion["unidadMedida"] }}</u></strong></p>
        </div>
    </div>
    <div class="container-table">
        <table class="table-costos-proyecto">
            <thead>
            <tr>
                <th scope="col">TIPO</th>
                <th scope="col">MARCA</th>
                <th scope="col">CANTIDAD</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">TOTAL</th>
            </tr>
            </thead>
            <tbody>
            @if(!is_null($paneles))
                <!-- SI LA COTIZACION TIENE *PANELES* -->
                <tr id="desglocePanel">
                    <td>Panel</td>
                    <td>{{ $paneles["vMarca"] }}</td>
                    <td>{{ $paneles["noModulos"] }}</td>
                    <td>{{ $paneles["vNombreMaterialFot"] }}</td>
                    @if($PdfConfig["subtotalesDesglozados"] === "true")
                        <td id="costoTotalPanel">${{ number_format($paneles["costoTotal"],2) }} USD</td>
                    @else
                        <td id="costoTotalPanel"></td>
                    @endif
                </tr>
            @endif
            @if(!is_null($inversores))
                <!-- SI LA COTIZACION TIENE *INVERSORES* -->
                <tr id="desgloceInversor">
                    <td>Inversor</td>
                    <td id="marcaInversor">
                        {{ $inversores["vMarca"] }}
                    </td>
                    @if($inversores["combinacion"] === "true")
                        <td colspan="2">
                            <p style="font-size:10px;">
                                {{ $inversores["MicroUno"]["vNombreMaterialFot"] }}: {{ $inversores["MicroUno"]["numeroDeInversores"] }}
                            </p>
                            <p style="font-size:10px;">
                                {{ $inversores["MicroDos"]["vNombreMaterialFot"] }}: {{ $inversores["MicroDos"]["numeroDeInversores"] }}
                            </p>
                        </td>
                    @else
                        <td id="cantidadInversor">
                            {{ $inversores["numeroDeInversores"] }}
                        </td>
                        <td id="modeloInversor" style="font-size: 13px;">
                            {{ $inversores["vNombreMaterialFot"] }}
                        </td>
                    @endif
                    @if($PdfConfig["subtotalesDesglozados"] === "true")
                        <td id="costoTotalInversor">
                            ${{ number_format($inversores["costoTotal"],2) }} USD
                        </td>
                        else
                        <td id="costoTotalInversor"></td>
                    @endif
                </tr>
            @endif
            @if(!is_null($estructura["_estructuras"]))
                <!-- SI LA COTIZACION TIENE *ESTRUCTURAS* -->
                <tr id="desgloceEstructura">
                    <td>Estructura</td>
                    <td id="marcaEstructura">
                        {{ $estructura["_estructuras"]["vMarca"] }}
                    </td>
                    <td id="cantidadEstructura">
                        {{ $estructura["cantidad"] }}
                    </td>
                    <td>Estructura de aluminio</td>
                    @if($PdfConfig["subtotalesDesglozados"] === "true")
                        <td id="costoTotalEstructuras">
                            ${{ number_format($estructura["costoTotal"],2) }} USD
                        </td>
                        else
                        <td id="costoTotalEstructuras"></td>
                    @endif
                </tr>
            @endif
            @if(!is_null($agregados["_agregados"]))
                <!-- SI LA COTIZACION TIENE *ESTRUCTURAS* -->
                <tr id="desgloceAgregados">
                    <td>Agregados</td>
                    <td></td>
                    <td></td>
                    <td>
                        <strong>Agregados (Desgloce en pag. 2)</strong>
                    </td>
                    <td></td>
                </tr>
            @endif
            @if($totales["manoDeObra"] > 0)
                <!-- SI LA COTIZACION TIENE *MANO DE OBRA* -->
                <tr id="desgloceManoDeObra">
                    <td>Mano de obra</td>
                    <td></td>
                    <td></td>
                    <td style="font-size:10px;">
                        *Instalacion *Servicio *Anclaje *Fijacion
                    </td>
                    <td></td>
                </tr>
            @endif
            @if($totales["otrosTotal"] > 0)
                <!-- SI LA COTIZACION TIENE *OTROS* -->
                <tr>
                    <td>Otros</td>
                    <td></td>
                    <td></td>
                    <td style="font-size:10px;">
                        *Cableado *Protecciones *Tramite CFE *Monitoreo PostVenta (permanente)
                    </td>
                    <td id="costoTotalOtros"></td>
                </tr>
            @endif
            <tr>
                <td></td>
                @if($descuento["porcentaje"] > 0)
                    <td style="background-color:#2593F0;">
                        <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                            Total s/Descuento
                        </p>
                    </td>
                @else
                    <td></td>
                @endif
                @if($descuento["porcentaje"] >= 1)
                    <td id="tdDescuento" style="background-color:green;">
                        <p style="text-align:center; color:white; font-weight:bolder; font-size:12px;">
                            Descuento ({{ $descuento["porcentaje"] }}%)
                        </p>
                    </td>
                @else
                    <td></td>
                @endif
                <td align="center">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/estados-unidos.png'))) }}"/>
                </td>
                <td align="center">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/banderas/mexico.png'))) }}"/>
                </td>
            </tr>
            <tr style="background-color: #E8E8E8;">
                <td><strong>Total sin IVA</strong></td>
                @if($descuento["porcentaje"] > 0)
                    <td id="tdTotalAntesDeDescuento" style="border-right:solid #2593F0; border-left:solid #2593F0; border-bottom:solid #2593F0;">
                        <p style="font-weight:bolder; text-align:center; font-size:15px; background-color:#FFF66D;">
                            ${{ number_format($descuento["precioSinDescuento"]) }} USD
                        </p>
                    </td>
                @else
                    <td></td>
                @endif
                @if($descuento["porcentaje"] >= 1)
                    <td id="descuentoUSD" style="border-right:solid green; border-left:solid green; border-bottom:solid green;">
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
            <tr style="background-color: #E8E8E8;">
                <td><strong>Total con IVA</strong></td>
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
        <p style="font-size:11px; color: #969696;" align="center"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">(${{ $tipoDeCambio }} mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
    </div>
    <!-- Logotipos && garantias de las marcas de los equipos -->
    <table class="table-contenedor" style="margin-top:15px;">
        <tr>
            @if(!is_null($paneles))
                <td id="imgLogoPanel" align="center" style="border: none; width: 110px; height: 90px;">
                    <img height="32px" width="32px" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/icon/generation-sun-electricity.png'))) }}"/>
                    <h4 style="margin-top: -10px;">Potencia instalada:</h4>
                    <h3 style="color:#3333FF;margin-top: -10px;">{{ ($paneles["fPotencia"] * $paneles["noModulos"])/1000 }} kWh</h3>
                </td>
            @endif
            @if(!is_null($paneles))
                @php($image = $paneles['vMarca'] . '.png')
                <td id="imgLogoPanel" align="center" style="border: none; width: 110px; height: 90px;">
                    <img style="width:100%; height:auto;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}">
                    <!--
                        <p style="text-align:center; font-size:10px; margin-top:-35px;">
                            <strong>{{ $paneles['vMarca'] }}</strong>
                        </p>-->
                </td>
            @endif
            @if(!is_null($inversores))
                @php($image = $inversores['vMarca'] . '.jpg')
                <td id="imgLogoInversor" align="center" style="border: none; width: 110px; height: 90px;">
                    <img style="width:100%; height:auto;" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}">
                    <!--<p style="text-align:center; font-size:10px; margin-top:-35px;">
                            <strong>{{ $inversores['vMarca'] }}</strong>
                        </p>-->
                </td>
            @endif
            @if(!is_null($estructura["_estructuras"]))
                @php($image = $estructura["_estructuras"]['vMarca'] . '.png')
                <td id="imgLogoEstructuras" align="center" style="border: none; width: 110px; height: 90px;">
                    <img style="width:100%; height:auto;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}">
                    <!--<p style="text-align:center; font-size:10px; margin-top:-15px;">
                            <strong>{{ $estructura["_estructuras"]['vMarca'] }}</strong>
                        </p>-->
                </td>
            @endif
        </tr>
    </table>
    <!-- Fin logos/marcas equip. -->
    <hr class="linea-division" style="background-color: #5576F2; margin-top:9px;">

    <!-- * Sellos * -->
    <table class="table-contenedor" style="margin-top:20px; margin-left: 20px; margin-right: 20px;">
        <tr>
            <td>
                <div style="height:90px; width:10%;">
                    <img style="width:100%; height:auto;" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/ance.jpg'))) }}">
                </div>
                <div style="margin-top:-110px; margin-left:90px;">
                    <p class="text-inferior-pag1">
                        Certificado de proveedor<br>confiable
                    </p>
                    <p class="text-inferior-pag1-secundary">
                        Clave: 20FIR00010A00R00
                    </p>
                </div>
            </td>
            <td>
                <div style="height:90px; width:10%;">
                    <img style="width:100%; height:auto;" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/wwf.jpg'))) }}">
                </div>
                <div style="margin-top:-110px; margin-left:70px;">
                    <p class="text-inferior-pag1">World Wildlife Fund</p>
                    <p class="text-inferior-pag1-secundary">
                        Ren Mx | WWF México
                        <br>
                        <a href="https://www.wwf.org.mx/">
                            https://www.wwf.org.mx/
                        </a>
                    </p>
                </div>
            </td>
            <td>
                <div style="height:50px; width:200px; margin-left: auto; margin-right: auto;">
                    <img style="width:100%; height:auto;" src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('/img/pdf/csolar.jpg'))) }}">
                </div>
                <div>
                    <p style="text-align:center; font-size:9px;">Programa avalado por INEEL, NAFIN, ICM y el Programa de las<br>Naciones Unidas para el Medio Ambiente (ONU)</p>
                    <p class="text-inferior-pag1-secundary" style="text-align:center;">
                        <a href="https://csolarmexico.com/empresas-fotovoltaicas-participantes/">
                            https://csolarmexico.com/empresas-fotovoltaicas-participantes/
                        </a>
                    </p>
                </div>
            </td>
        </tr>
    </table>

    <div class="footer-page"></div>
    <!-- Fin pagina 1 -->

    <!-- Pagina 2 - Agregados -->
    @if(!is_null($agregados["_agregados"]))
        <hr class="salto-pagina">

        <!-- HeaderPage -->
        <table>
            <tr>
                <td>
                    <!-- LogoTipo Etesla -->
                    <img id="logoTipoEtesla" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/etesla-logo.png'))) }}">
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
    <!-- Fin - Pagina2 -->
</div>
</body>
</html>
