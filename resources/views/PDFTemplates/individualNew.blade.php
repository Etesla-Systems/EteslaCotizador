<!Doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Cotizacion Individual</title>
</head>

<style>
    @page
    {
        margin: 1.27cm 1.27cm;
    }

    *{
        font-family: "Calibri, sans-serif";
    }

    .pequena
    {
        width: 30%; /* o el porcentaje deseado */
        height: auto;
    }

    .logo
    {
        width: 45%; /* o el porcentaje deseado */
        height: auto;
    }

    .logo2
    {
        width: 70%; /* o el porcentaje deseado */
        height: auto;
    }

    .logo3
    {
        width: 10%; /* o el porcentaje deseado */
        height: auto;
    }

    .celdaCot
    {
        width: 130px;
        height: 25px;
        background-color: #7ab317;
        font-size: 14px;
        color: white;
        border: none;
    }

    .celdaCotCan
    {
        width: 90px;
        height: 25px;
        background-color: #7ab317;
        font-size: 14px;
        color: white;
        border: none;
    }

    .celdaCot3
    {
        width: 170px;
        height: 25px;
        background-color: #7ab317;
        font-size: 14px;
        color: white;
        border: none;
    }

    .letraVerde
    {
        color: #7ab317;
    }

    .letraAzul
    {
        color: #082567;
    }

    .celdaCot2
    {
        width: 130px;
        height: 19px;
        background-color: lightgrey;
        font-size: 14px;
    }

    .celdaBandera
    {
        width: 130px;
        height: 50px;
        background-color: lightgrey;
        font-size: 14px;
    }

    .celdaFoot
    {
        width: 223px;
        height: 260px;
    }

    .tablaHeader
    {
        text-align: left;
    }

    .container
    {
        margin-left: 5px;
    }

    .container_2
    {
        margin-left: 80px;
    }

    .container3
    {
        margin-left: 13px;
    }

    .container4
    {
        margin-left: 16px;
    }

    .container5
    {
        margin-left: 22px;
    }

    .container6
    {
        margin-left: 30px;
    }

    .container_logo
    {
        margin-left: 25px;
    }

    .marginTop
    {
        margin-top: 3px;
    }

    .celdas
    {
        text-align: center;
    }

    .equipos
    {
        width: 22%; /* o el porcentaje deseado */
        height: auto;
    }

    .banderas
    {
        width: 25%; /* o el porcentaje deseado */
        height: auto;
    }

    .logos
    {
        width: 35%; /* o el porcentaje deseado */
        height: auto;
    }

    .logos2
    {
        width: 46%; /* o el porcentaje deseado */
        height: auto;
    }

    .logos4
    {
        width: 80%; /* o el porcentaje deseado */
        height: auto;
    }

    .logos3
    {
        width: 33%; /* o el porcentaje deseado */
        height: auto;
    }

    .sangriaEquipos
    {
        margin-left: 70px;
    }

    .borde-ancho
    {
        padding-left: 30px; /* Espaciado izquierdo */
        padding-right: 30px; /* Espaciado derecho */
    }

    .tablePrueba
    {
        border: solid white;
    }

    .bordeAzul
    {
        border-bottom: #0A1931;
    }

    .celdaInfo
    {
        height: 3px;
    }

    .texPequeno
    {
        font-size: 12px;
    }

    .texMediano
    {
        font-size: 14px;
    }

    .texMedio
    {
        font-size: 14px;
    }

    .texGrande
    {
        font-size: 27px;
    }

    .marginCeldas
    {
        margin-top: 10%;
    }

    .marginCeldas_2
    {
        margin-top: 13%;
    }

    .marginCeldas_3
    {
        margin-top: 10%;
    }

    .borderless-table
    {
        border-collapse: collapse;
        border: none;
    }

    .container7
    {
        margin-left: 25px;
    }

    .container_3
    {
        margin-left: 70px;
    }

    .container_4
    {
        margin-left: 18px;
    }

</style>

<body>
<header>
    <div>
        <table>
            <tr>
                <th>
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/eTesla.png'))) }}" alt="eTesla_logo" class="logo">
                </th>
                <th class="tablaHeader">
                    <p class="texGrande">Sistema fotovoltaico interconectado a la red de CFE</p>
                </th>
            </tr>
        </table>
    </div>
</header>

<section class="">
    <div>
        <table>
            <tr>
                <td class="letraAzul"><strong>Datos del cliente</strong></td>
            </tr>
            <tr>
                <td id="nombreCliente" class="celdaInfo texMedio">Cliente: {{ $cliente["vNombrePersona"] ." ". $cliente["vPrimerApellido"] ." ". $cliente["vSegundoApellido"] }}</td>
            </tr>

            <tr>
                <td id="direccionCliente" class="celdaInfo texMedio">Dirección: {{ $cliente["vCalle"] ." ". $cliente["vMunicipio"] ." ". $cliente["vEstado"] }}</td>
            </tr>

            @if($cliente["vTelefono"] != "" || $cliente["vCelular"] != "")
                <tr>
                    <td id="telefono" class="celdaInfo texMedio">Contacto: {{ $cliente["vTelefono"]  . "  /  " .  $cliente["vCelular"] }}</td>
                </tr>
            @endif
            <tr>
                <td id="asesor" class="celdaInfo texMedio">Asesor: {{ $vendedor["vNombrePersona"] ." ". $vendedor["vPrimerApellido"] ." ". $vendedor["vSegundoApellido"] }}</td>
            </tr>

            <tr>
                <td id="sucursal" class="celdaInfo texMedio">Sucursal: {{ $vendedor["vOficina"] }}</td>
            </tr>

            <tr>
                <td id="caducidad-propuesta" class="celdaInfo texMedio letraVerde"><strong>Validez de {{ $expiracion["cantidad"] . " " . $expiracion["unidadMedida"] }}</strong></td>
            </tr>

            <tr>
                <td id="fechaCreacion" class="celdaInfo texMedio">Fecha de generación: {{ date('Y-m-d') }}</td>
            </tr>
        </table>
    </div>

    <div>
        <table class="container borderless-table marginTop">
            <thead>
            <tr>
                <th class="celdaCot">Tipo</th>
                <th class="celdaCot">Marca</th>
                <th class="celdaCotCan">Cantidad</th>
                <th class="celdaCot3">Nombre</th>
                <th class="celdaCot">Total</th>
            </tr>
            </thead>

            <tbody>
            @if(!is_null($paneles))
                <tr id="desglocePanel">
                    <td class="celdas texMediano">Panel</td>
                    <td class="celdas texMediano">{{ $paneles["vMarca"] }}</td>
                    <td class="celdas texMediano">{{ $paneles["noModulos"] }}</td>
                    <td class="celdas texMediano">{{ $paneles["vNombreMaterialFot"] }}</td>
                    @if($PdfConfig["subtotalesDesglozados"] === "true")
                        <td id="costoTotalPanel" class="celdas texMediano">${{ number_format($paneles["costoTotal"],2) }} USD</td>
                    @else
                        <td id="costoTotalPanel" class="celdas texMediano"></td>
                    @endif
                </tr>
            @endif
            @if(!is_null($inversores))
                <tr id="desgloceInversor">
                    <td class="celdas celdaCot2">Inversor</td>
                    <td id="marcaInversor" class="celdas celdaCot2">{{ $inversores["vMarca"] }}</td>
                    @if($inversores["combinacion"] === "true")
                        <td class="celdas celdaCot2 texPequeno"> {{ $inversores["MicroUno"]["vNombreMaterialFot"] }}: {{ $inversores["MicroUno"]["numeroDeInversores"] }}</td>
                        <td class="celdas celdaCot2">{{ $inversores["MicroDos"]["vNombreMaterialFot"] }}: {{ $inversores["MicroDos"]["numeroDeInversores"] }}</td>
                    @else
                        <td id="cantidadInversor" class="celdas celdaCot2">{{ $inversores["numeroDeInversores"] }}</td>
                        <td id="modeloInversor" class="celdas celdaCot2 texPequeno">{{ $inversores["vNombreMaterialFot"] }}</td>
                    @endif
                    @if($PdfConfig["subtotalesDesglozados"] === "true")
                        <td id="costoTotalInversor" class="celdas celdaCot2">${{ number_format($inversores["costoTotal"],2) }} USD</td>
                    @else
                        <td id="costoTotalInversor" class="celdas celdaCot2"></td>
                    @endif
                </tr>
            @endif
            @if(!is_null($estructura["_estructuras"]))
                <tr>
                    <td class="celdas texMediano">Estructura</td>
                    <td id="marcaEstructura" class="celdas texMediano"> {{ $estructura["_estructuras"]["vMarca"] }}</td>
                    <td id="cantidadEstructura" class="celdas texMediano">{{ $estructura["cantidad"] }}</td>
                    <td class="celdas texMediano">Estructura de aluminio</td>
                    @if($PdfConfig["subtotalesDesglozados"] === "true")
                        <td class="celdas texMediano">${{ number_format($estructura["costoTotal"],2) }} USD</td>
                    @else
                        <td class="celdas texMediano"></td>
                    @endif
                </tr>
            @endif
            @if($totales["manoDeObra"] > 0)
                <tr>
                    <td class="celdas celdaCot2">Mano de obra</td>
                    <td class="celdas celdaCot2"></td>
                    <td colspan="2" class="celdas celdaCot2 texPequeno">*instalación *servicio *Anclaje *Fijación</td>
                    <td class="celdas celdaCot2"></td>
                    <td class="celdas texMediano"></td>
                </tr>
            @endif
            @if($totales["otrosTotal"] > 0)
                <tr>
                    <td class="celdas texMediano">Otros</td>
                    <td class="celdas texMediano"></td>
                    <td colspan="2" class="celdas texPequeno">*cableado *protecciones *Trámite CFE *Monitoreo: PostVenta (permanente)</td>
                    <td class="celdas texMediano"></td>
                    <td class="celdas texMediano"></td>
                </tr>
            @endif
            <tr>
                <td class="celdaBandera"></td>
                @if($descuento["porcentaje"] > 0)
                    <td class="celdaBandera">Total s/Descuento</td>
                @else
                    <td class="celdaBandera"></td>
                @endif

                @if($descuento["porcentaje"] >= 1)
                    <td id="tdDescuento" class="celdaBandera">Descuento ({{ $descuento["porcentaje"] }}%)</td>
                @else
                    <td class="celdaBandera"></td>
                @endif
                <td class="celdas celdaBandera"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/pdf/USA_1.png')))}}" alt="USA" class="banderas marginTop"></td>
                <td class="celdas celdaBandera"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/pdf/MEX_1.png')))}}" alt="MEX" class="banderas marginTop"></td>
            </tr>

            <tr>
                <td class="celdas celdaCot2">Total sin IVA</td>
                @if($descuento["porcentaje"] > 0)
                    <td id="tdTotalAntesDeDescuento" class="celdaCot2">${{ number_format($descuento["precioSinDescuento"]) }} USD</td>
                @else
                    <td class="celdaCot2"></td>
                @endif
                @if($descuento["porcentaje"] >= 1)
                    <td id="descuentoUSD" class="celdaCot2">${{ number_format($descuento["descuento"],2) }} USD</td>
                @else
                    <td id="descuentoUSD" class="celdaCot2"></td>
                @endif
                <td class="celdas texMediano celdaCot2">${{ number_format($totales["precio"], 2) }} USD</td>
                <td class="celdas texMediano celdaCot2">${{ number_format($totales["precioMXNSinIVA"], 2) }} MXN</td>
            </tr>

            <tr>
                <td class="celdas celdaCot2">Total con IVA</td>
                <td class="celdaCot2"></td>
                <td class="celdaCot2"></td>
                <td class="celdas texMediano celdaCot2"> ${{ number_format($totales["precioMasIVA"], 2) }} USD</td>
                <td class="celdas texMediano celdaCot2">${{ number_format($totales["precioMXNConIVA"], 2) }} MXN</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div>
        <p class="texPequeno"><strong class="letraVerde">Nota:</strong> El tipo de cambio (${{ $tipoDeCambio }} mxn) se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de
            anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado
            para conexión con CFE.
        </p>
    </div>

    <div>
        <table class="sangriaEquipos">
            <tr>
                @if(!is_null($paneles))
                    @php($image = $paneles['vMarca'] . '.png')
                    <td class=""><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/' . $image))) }}" alt="Panel" class="equipos"></td>
                @endif
                @if(!is_null($inversores))
                    @php($image = $inversores['vMarca'] . '.png')
                    <td class="borde-ancho"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/' . $image))) }}" alt="Estructura" class="equipos"></td>
                @endif
                @if(!is_null($estructura["_estructuras"]))
                    @php($image = $estructura["_estructuras"]['vMarca'] . '.png')
                    <td class=""><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/' . $image))) }}" alt="Inversor" class="equipos"></td>
                @endif
            </tr>
        </table>
    </div>

    <div>
        <table class="tablePrueba bordeAzul">
            <tr>
                <td class="tablePrueba celdaFoot container">
                    <div class="marginCeldas_3">
                        <h5 class="container6">¡Programa avalado!</h5>
                        <div class="marginCeldas_3 container">
                            <p class="texPequeno">Por INEEL, NAFIN, ICM y el programa de las Naciones Unidas para el Medio Ambiente (ONU)</p>
                        </div>
                        <div class="container3">
                            <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('img/pdf/csolar.jpg'))) }}" class="logos4">
                        </div>
                    </div>
                </td>

                @if(!is_null($paneles))
                    <td class="tablePrueba celdaFoot celdas">
                        <div>
                            <h3 class="container_4">Potencia instalada</h3>
                            <table class="container_3">
                                <tr>
                                    <td>
                                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/icon/generation-sun-electricity.png'))) }}" class="logo3">
                                    </td>

                                    <td><p class="textMediano"><strong class="letraAzul">{{ ($paneles["fPotencia"] * $paneles["noModulos"])/1000 }} kWh</strong></p></td>
                                </tr>
                            </table>
                            <div class="">
                                <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('img/pdf/extra.jpg'))) }}" class="logo2 container7">
                            </div>
                        </div>
                    </td>
                @endif

                <td class="tablePrueba celdaFoot">
                    <div class="col-md-4 container marginCeldas">
                        <div class="container5">
                            <h5>¡Somos una empresa avalada!</h5>
                        </div>

                        <table>
                            <tr class="">
                                <td>
                                    <div class="container4">
                                        <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('img/pdf/wwf.jpg'))) }}" class="logos3">
                                        <p class="texPequeno container">World Wildlife Fund</p>
                                    </div>
                                </td>

                                <td>
                                    <div class="">
                                        <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('img/pdf/ance.jpg'))) }}" class="logos3">
                                        <p class="texPequeno container">Clave: 20FIR00010A00R00</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</section>
</body>


<!-- Página dos -->
@if(!is_null($agregados["_agregados"]))
    <hr class="salto-pagina">

    <!-- HeaderPage -->
    <table>
        <tr>
            <th>
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/eTesla.png'))) }}" alt="eTesla_logo" class="logo">
            </th>
            <th class="tablaHeader">
                <p class="texGrande">Agregados</p>
            </th>
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
</html>
