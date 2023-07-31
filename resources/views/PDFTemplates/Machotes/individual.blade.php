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
            margin-left: 15px;
        }

        .container_2
        {
            margin-left: 80px;
        }

        .container_3
        {
            margin-left: 70px;
        }

        .marTop
        {
            margin-top: 0;
        }

        .container_4
        {
            margin-left: 18px;
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

        .container7
        {
            margin-left: 25px;
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
                        <td id="nombreCliente" class="celdaInfo texMedio">Cliente: Jose Leal</td>
                    </tr>

                    <tr>
                        <td id="direccionCliente" class="celdaInfo texMedio">Dirección: Calle 1 Orizaba</td>
                    </tr>

                    <tr>
                        <td id="telefono" class="celdaInfo texMedio">Contacto: 1234567890/1234567890</td>
                    </tr>

                    <tr>
                        <td id="asesor" class="celdaInfo texMedio">Asesor: Eileen Alvarado</td>
                    </tr>

                    <tr>
                        <td id="sucursal" class="celdaInfo texMedio">Sucursal: Oso, Col del Valle Sur, Benito Juarez, 03100 Ciudad de México, CDMX</td>
                    </tr>

                    <tr>
                        <td id="caducidad-propuesta" class="celdaInfo texMedio letraVerde"><strong>Validez de 15 días</strong></td>
                    </tr>

                    <tr>
                        <td id="fechaCreacion" class="celdaInfo texMedio">Fecha de generación: 2023-07-21</td>
                    </tr>
                </table>
            </div>

            <div>
                <table class="container borderless-table marginTop">
                    <thead>
                        <tr>
                            <th class="celdaCot">Tipo</th>
                            <th class="celdaCot">Marca</th>
                            <th class="celdaCot">Cantidad</th>
                            <th class="celdaCot">Nombre</th>
                            <th class="celdaCot">Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr id="desglocePanel">
                            <td class="celdas texMediano">Panel</td>
                            <td class="celdas texMediano">Axitec</td>
                            <td class="celdas texMediano">4</td>
                            <td class="celdas texMediano">Axitec123</td>
                            <td id="costoTotalPanel" class="celdas texMediano"></td>
                        </tr>

                        <tr id="desgloceInversor">
                            <td class="celdas celdaCot2">Inversor</td>
                            <td id="marcaInversor" class="celdas celdaCot2">Goodwe</td>
                            <td class="celdas celdaCot2">1</td>
                            <td class="celdas celdaCot2">Goodwe 1000</td>
                            <td id="costoTotalInversor" class="celdas celdaCot2"></td>
                        </tr>

                        <tr>
                            <td class="celdas texMediano">Estructura</td>
                            <td id="marcaEstructura" class="celdas texMediano"> Supports</td>
                            <td id="cantidadEstructura" class="celdas texMediano">4</td>
                            <td class="celdas texMediano">Estructura de aluminio</td>
                            <td class="celdas texMediano"></td>
                        </tr>

                        <tr>
                            <td class="celdas celdaCot2">Mano de obra</td>
                            <td class="celdas celdaCot2"></td>
                            <td colspan="2" class="celdas celdaCot2">*instalación *servicio *Anclaje *Fijación</td>
                            <td class="celdas celdaCot2"></td>
                            <td class="celdas texMediano"></td>
                        </tr>

                        <tr>
                            <td class="celdas texMediano">Otros</td>
                            <td class="celdas texMediano"></td>
                            <td colspan="2" class="celdas texMediano">*cableado *protecciones *Trámite CFE *Monitoreo: PostVenta (permanente)</td>
                            <td class="celdas texMediano"></td>
                            <td class="celdas texMediano"></td>
                        </tr>

                        <tr>
                            <td class="celdaBandera"></td>
                            <td class="celdaBandera"></td>
                            <td class="celdaBandera"></td>
                            <td class="celdas celdaBandera"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/pdf/USA_1.png')))}}" alt="USA" class="banderas marginTop"></td>
                            <td class="celdas celdaBandera"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/pdf/MEX_1.png')))}}" alt="MEX" class="banderas marginTop"></td>
                        </tr>

                        <tr>
                            <td class="celdas celdaCot2">Total sin IVA</td>
                            <td class="celdaCot2"></td>
                            <td id="descuentoUSD" class="celdaCot2"></td>
                            <td class="celdas texMediano celdaCot2">$3,737.00 USD</td>
                            <td class="celdas texMediano celdaCot2">$62,954.00 MXN</td>
                        </tr>

                        <tr>
                            <td class="celdas celdaCot2">Total con IVA</td>
                            <td class="celdaCot2"></td>
                            <td class="celdaCot2"></td>
                            <td class="celdas texMediano celdaCot2">$4,335.00 USD</td>
                            <td class="celdas texMediano celdaCot2">$73,027.00 MXN</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div>
                <p class="texPequeno"><strong class="letraVerde">Nota:</strong> El tipo de cambio ($16.846 mxn) se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de
                    anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado
                    para conexión con CFE.
                </p>
            </div>

            <div>
                <table class="sangriaEquipos">
                    <tr>
                        <td class=""><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/Axitec.png'))) }}" alt="Panel" class="equipos"></td>
                        <td class="borde-ancho"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/estructura/Supports.png'))) }}" alt="Estructura" class="equipos"></td>
                        <td class=""><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/inversor/Goodwe.png'))) }}" alt="Inversor" class="equipos"></td>
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

                        <td class="tablePrueba celdaFoot celdas">
                            <div class="">
                                <h3 class="container_4">Potencia instalada</h3>
                                <table class="container_3">
                                    <tr>
                                        <td>
                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/icon/generation-sun-electricity.png'))) }}" class="logo3">
                                        </td>

                                        <td><p class="textMediano"><strong class="letraAzul"></strong></p></td>
                                    </tr>
                                </table>
                                <div class="">
                                    <img src="data:image/jpg;base64,{{ base64_encode(file_get_contents(public_path('img/pdf/extra.jpg'))) }}" class="logo2 container7">
                                </div>
                            </div>
                        </td>

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
</html>

