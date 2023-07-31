<!Doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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

    .celdaComp
    {
        width: 130px;
        height: 35px;
        font-size: 14px;
        border: solid #7ab317;
    }

    .celdaCompR
    {
        width: 130px;
        height: 35px;
        font-size: 14px;
        border: solid #CC0F03;
    }

    .tablaCompVerde
    {
        border: solid #7ab317;
    }

    .tablaCompRoja
    {
        border: solid #CC0F03;
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

    .marginCeldas_4
    {
        margin-top: 1%;
    }

    .borderless-table
    {
        border-collapse: collapse;
        border: none;
    }

    .table-contenedor {
        width: 100%;
        border-collapse: collapse;
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

            <tr>
                <td class="letraAzul"><strong>Paquete fotovoltaico de 3.3kWp</strong></td>
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
       <div>
           <table class="tablaCompRoja">
               <tr>
                   <td class="celdaCompR">Total a pagar del periodo facturado</td>
               </tr>

               <tr>
                   <td class="celdaCompR">$12345</td>
               </tr>

               <tr>
                   <td class="celdaCompR">pago actual c/paneles</td>
               </tr>

               <tr>
                   <td class="celdaCompR">1,060 kW</td>
               </tr>

               <tr>
                   <td class="celdaCompR">1C</td>
               </tr>
           </table>
       </div>

        <div>
            <table class="tablaCompVerde">
                <tr>
                    <td class="celdaComp">Total a pagra del periodo facturado</td>
                </tr>

                <tr>
                    <td class="celdaComp">$12345</td>
                </tr>

                <tr>
                    <td class="celdaComp">pago actual s/paneles</td>
                </tr>

                <tr>
                    <td class="celdaComp">1,060 kW</td>
                </tr>

                <tr>
                    <td class="celdaComp">1C</td>
                </tr>
            </table>
        </div>

        <div>
            <table>

            </table>
        </div>
    </div>

</section>
</body>
</html>

