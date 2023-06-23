<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<style type="text/css">
    /* --------------- ---------------------- */
    *{
        font-family: 'Roboto', sans-serif;
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
        margin-top: -30px;
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
        margin-top: -200px;
        margin-left: 80px;
        border-radius: 15px;
        width: 360px;
        height: 225px;
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
    .garantias{
        line-height: 50%;
        text-align: center;
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
            <p id="nombreCliente" class="textIncProupesta">Eduardo Herrera Aldaraca</p>
            <p id="direccionCliente" class="textIncProupesta">Calle Jalisco no. 5, Orizaba, Veracruz</p>
            <p id="fechaCreacion" class="textIncProupesta"><strong>{{ now() }}</strong></p>
            <p id="asesor" class="textIncProupesta"><strong>Asesor:</strong> Jose Antonio Hernandez Gutierrez</p>
        </div>
    </div>
    <br>
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
            <tr id="desglocePanel">
                <td>Panel</td>
                <td>Canadian</td>
                <td>7</td>
                <td>Canadian 465 W</td>
                <td id="costoTotalPanel"></td>
            </tr>
            <tr id="desgloceInversor">
                <td>Inversor</td>
                <td id="marcaInversor">Goodwe</td>
                <td id="cantidadInversor">2</td>
                <td id="modeloInversor">Goodwe 2500 w</td>
                <td id="costoTotalInversor"></td>
            </tr>
            <tr id="desgloceEstructura">
                <td>Estructura</td>
                <td id="marcaEstructura">Everest</td>
                <td id="cantidadEstructura">4</td>
                <td>Estructura de aluminio</td>
                <td id="costoTotalEstructura"></td>
            </tr>
            <tr id="desgloceManoDeObra">
                <td>Mano de obra</td>
                <td>Etesla</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Material electrico</td>
                <td>Etesla</td>
                <td></td>
                <td></td>
                <td id="costoTotalOtros"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td align="center"><img src="https://img.icons8.com/color/24/000000/usa-circular.png"/></td>
                <td align="center"><img src="https://img.icons8.com/color/24/000000/mexico-circular.png"/></td>
            </tr>
            <tr style="background-color: #E8E8E8;">
                <td><strong>Subtotal sin IVA</strong></td>
                <td></td>
                <td></td>
                <td id="subtotalSinIVAUSD" align="center">$10,000 USD</td>
                <td id="subtotalSinIVAMXN" align="center">$12,000 MXN</td>
            </tr>
            <tr style="background-color: #E8E8E8;">
                <td><strong>Total con IVA</strong></td>
                <td></td>
                <td></td>
                <td id="totalConIVAUSD" align="center">$11,000 USD</td>
                <td id="totalConIVAMXN" align="center">$13,000 MXN</td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- Leyenda - Tipo de cambio -->
    <div id="leyendaTipoDeCambio" style="margin-left:20px; margin-right:20px;">
        <p style="font-size:11px; color: #969696;" align="center"><strong style="color: #2E2D2D;">NOTA: </strong>El tipo de cambio <strong style="color: #2E2D2D;">($20 mxn)</strong> se tomará el reportado por Banorte a la Venta del día en que se realice cada pago. Se requiere de un 50% de anticipo a la aprobación del proyecto, 35% antes de realizar el embarque de equipos, y 15% posterior a la instalación. El proyecto se entrega preparado para conexión con CFE.</p>
    </div>
    <!-- Fin logos/marcas equip. -->
    <!-- Garantias de las marcas -->
    <div class="garantias">
        <p>Garantia en el panel <strong>Canadian</strong> con 25 años de garantia</p>
        <p>Garantia en el inversor <strong>Goodwe</strong> con 15 años de garantia</p>
        <p>Garantia de 20 años en la marca de soportes <strong>Everest</strong></p>
    </div>
    <!-- Fin - Garantias de las marcas -->
    <hr class="linea-division" style="background-color: #5576F2; margin-top:-8px;">
    <table class="table-contenedor" style="margin-top: 35px;">
        <tr>
            <td>
                <div>
                    <div style="margin-left:32px;">
                        <img style="margin-top:18px;" src="data:image/png;base64,">
                    </div>
                    <div style="margin-top:-50px; margin-left:80px;">
                        <p class="text-inferior-pag1">TODO INCLUIDO:</p>
                        <p class="text-inferior-pag1-secundary" style="margin-top:-9px; width: 65%;">*Instalación. *Servicio. *Anclaje. *Fijación. *Garantia. *Mano de obra.</p>
                    </div>
                </div>
            </td>
            <td>
                <div>
                    <div style="margin-left:32px;">
                        <img style="width: 140px; height: 78px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/img/equipos/logos/panel/Axitec.png'))) }}">
                    </div>
                    <div style="margin-top: -50px; margin-left:80px;">
                        <p class="text-inferior-pag1">POTENCIA POR INSTALAR:</p>
                        <p class="text-inferior-pag1-secundary" style="margin-top:-9px;">4.43 KwP</p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <div class="footer-page"></div>

    <hr class="salto-pagina">

    <!-- Pagina 2 - Agregados -->
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
        <tr>
            <td>Agregado 1</td>
            <td>6</td>
            <td>$ 10 MXN</td>
        </tr>
        <tr>
            <td>Agregado 1</td>
            <td>6</td>
            <td>$ 10 MXN</td>
        </tr>
        <tr>
            <td>Agregado 1</td>
            <td>6</td>
            <td>$ 10 MXN</td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Costo total</strong></td>
            <td>$ 60 MXN</td>
        </tr>
        </tbody>
    </table>
    <!-- Fin Pagina 2 -->
</div>
<!-- Fin pagina 1 -->
</body>
</html>
