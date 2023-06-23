@extends('cotizador.includes.app')
@section('window', 'Dashboard')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h3 class="subtitle-window">Información</h3>
    </div>

    <div>
        <!--Inicia el carrusel-->
        <div id="carruselInfo" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('assets/img/banner_dollar.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Precio actual: ${{ $precioDolar->precioDolar }} MXN</h5>
                        <p>Última actualización: {{ $precioDolar -> fechaUpdate }}</p>
                    </div>
                </div>
                <div class="carousel-item" id="bannerPanel" name="bannerPanel">
                    <a href="#panelesInfo"><img src="{{asset('assets/img/banner_panel.png')}}" class="d-block w-100" alt="panel"></a>
                </div>
                <div class="carousel-item" id="bannerEstructura" name="bannerEstructura">
                    <a href="#estructurasInfo"><img src="{{asset('assets/img/banner_estruc.png')}}" class="d-block w-100" alt="estructura"></a>
                </div>
                <div class="carousel-item" id="bannerInversor" name="bannerInversor">
                    <a href="#inversoresInfo"><img src="{{asset('assets/img/banner_inversor.png')}}" class="d-block w-100" alt="inversor"></a>
                </div>
            </div>
            <!--Botones del carrusel-->
            <button class="carousel-control-prev" type="button" data-bs-target="#carruselInfo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carruselInfo" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
        <!--Finaliza div del carrusel-->

        <!--Inicia sección de información sobre los paneles-->
        <section id="panelesInfo">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                <h3 class="subtitle-window">Paneles</h3>
            </div>
            <div>
                <p>Conoce más acerca de los paneles que trabajamos</p>
            </div>
            <!--Inicia cards de información-->
            <div class="mt-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <div class="contenedor">
                                <img src="{{asset('assets/img/img_info/canadian_1.jpg')}}" class="card-img-top" id="" alt="">
                            </div>
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>CANADIAN SOLAR</strong></p>
                                <p>Potencia: 550 watts </p>
                                <p>Medidas: 2.26 x 1.13 x 0.35 m </p>
                                <p>Peso: 27,8 kg (61.3 lbs) </p>
                                <p>Garantía de producción: 25 años </p>
                                <p>Garantía de fábrica: 12 años</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/axitec_1.jpg')}}" class="card-img-top" alt="card2">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>AXITEC</strong></p>
                                <p>Potencia: 460 watts </p>
                                <p>Medidas: 2094 x 1038 x 35 mm</p>
                                <p>Peso: 23.8 kg  </p>
                                <p>Garantía de producción: 25 años </p>
                                <p>Garantía de fábrica: 15 años</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/axitec_1.jpg')}}" class="card-img-top" alt="card3">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>AXITEC</strong></p>
                                <p>Potencia: 550 watts </p>
                                <p>Medidas: 2.27 x 1.13 x 0.35 m</p>
                                <p>Peso: 28,5 kg  </p>
                                <p>Garantía de producción: 25 años </p>
                                <p>Garantía de fábrica: 15 años</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/jinko_1.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>JINKO</strong></p>
                                <p>Potencia: 465 watts </p>
                                <p>Medidas: 2.184 x 1.02 x .40 m</p>
                                <p>Peso: 25.1 kg (55,12 lbs)</p>
                                <p>Garantía de producción: 25 años </p>
                                <p>Garantía de fábrica: 12 años </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/jinko_1.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>JINKO</strong></p>
                                <p>Potencia: 530 watts </p>
                                <p>Medidas: 2.27 x 1.13 x .35 m</p>
                                <p>Peso: 28.9 kg (63,7 lns)</p>
                                <p>Garantía de producción: 25 años </p>
                                <p>Garantía de fábrica: 12 años </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/jinko_1.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>JINKO</strong></p>
                                <p>Potencia: 550 watts </p>
                                <p>Medidas: 2.27 x 1.13 x .35 m</p>
                                <p>Peso: 28.9 kg (63,7 lbs)</p>
                                <p>Garantía de producción: 25 años </p>
                                <p>Garantía de fábrica: 12 años </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 ">
                        <div class="col-md-12 d-flex justify-content-end">
                            <a href="#carruselInfo"><button class="btn btn-azul2"><i class="uil uil-arrow-up"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Finaliza sección de información sobre los paneles-->

        <!--Inicia sección de información sobre las estructuras-->
        <section id="estructurasInfo">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                <h3 class="subtitle-window">Estructuras</h3>
            </div>
            <div>
                <p>Conoce más acerca de las estructuras que trabajamos</p>
            </div>
            <div class="mt-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/estructura.jpg')}}" class="card-img-top" alt="card1">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>SUNFER</strong></p>
                                <p>Materiales: Aluminio crudo </p>
                                <p><strong>(Ambiente no agresivo)</strong><br>
                                    Distancia a la costa: Mayor a 5 Km <br>
                                    Garantía: 15 años
                                </p>
                                <p><strong>(Ambiente agresivo)</strong><br>
                                    Distancia a la costa: Menor a 5 Km <br>
                                    Garantía: 5 años
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/estructura.jpg')}}" class="card-img-top" alt="card2">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>SUNFER</strong></p>
                                <p>Materiales: Aluminio anodizado</p>
                                <p><strong>(Ambiente no agresivo)</strong><br>
                                    Distancia a la costa: Mayor a 5 Km <br>
                                    Garantía: 25 años
                                </p>
                                <p><strong>(Ambiente agresivo)</strong><br>
                                    Distancia a la costa: Menor a 5 Km <br>
                                    Garantía: 25 años
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/estructura.jpg')}}" class="card-img-top" alt="card3">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>EVEREST K2 SYSTEMS</strong></p>
                                <p>Materiales: Aluminio marino</p>
                                <p>Grado: 6000</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/estructura.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>SUPORTS</strong></p>
                                <p>Aplicación sobre cubierta: <br>
                                    Contrapeso hormigón <br>
                                    Cubierta de teja <br>
                                    Chapa perfilada <br>
                                    Panel sándwich</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 ">
                        <div class="col-md-12 d-flex justify-content-end">
                            <a href="#carruselInfo"><button class="btn btn-azul2"><i class="uil uil-arrow-up"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Finaliza sección de información sobre las estructuras-->

        <!--Inicia sección de información sobre los inversores-->
        <section id="inversoresInfo">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                <h3 class="subtitle-window">Inversores</h3>
            </div>
            <div>
                <p>Conoce más acerca de los inversores que trabajamos</p>
            </div>
            <div class="mt-2 mb-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/APS_DS3D-01.jpg')}}" class="card-img-top" alt="card1">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>APsystems</strong></p>
                                <p>Modelo: DS3D</p>
                                <p>Inversor: Micro inversor </p>
                                <p>Módulos conectados por unidad: 4</p>
                                <p>Potencia de salida máxima: 2000 watts</p>
                                <p>Eficiencia máxima: 97% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/APS_YC600-01.jpg')}}" class="card-img-top" alt="card2">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>APsystems</strong></p>
                                <p>Modelo: YC600B</p>
                                <p>Inversor: Micro inversor </p>
                                <p>Módulos conectados por unidad: 2</p>
                                <p>Potencia de salida máxima: 750 VA</p>
                                <p>Eficiencia máxima: 96% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/enphase-iq7.jpg')}}" class="card-img-top" alt="card3">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>ENPHASE</strong></p>
                                <p>Modelo: IQ7+</p>
                                <p>Inversor: Micro inversor </p>
                                <p>Optimizado para módulos FV de alta potencia de:
                                    módulos de 60 celdas, 72 celdas, y 96 celdas</p>
                                <p>Potencia de salida máxima: 295 VA</p>
                                <p>Eficiencia máxima: 97% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/enphase_7a.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>ENPHASE</strong></p>
                                <p>Modelo: 7A</p>
                                <p>Inversor: Micro inversor </p>
                                <p>Optimizado para módulos FV de alta potencia de:
                                    Módulos de 60 celdas y 72 celdas</p>
                                <p>Potencia de salida máxima: 366 VA</p>
                                <p>Eficiencia máxima: 97% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/enphase_IQ8H.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>ENPHASE</strong></p>
                                <p>Modelo: 8H</p>
                                <p>Inversor: Micro inversor </p>
                                <p>Combinación de módulos recomendada:
                                    320W – 540W+</p>
                                <p>Potencia de salida máxima: 380 VA</p>
                                <p>Eficiencia máxima: 97,6% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/enphase_7a.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>ENPHASE</strong></p>
                                <p>Modelo: 7AM</p>
                                <p>Inversor: Micro inversor </p>
                                <p>Optimizado para módulos FV de alta potencia de:
                                    60 celdas o 120 medias celdas y 72 celdas o 144 medias celdas</p>
                                <p>Potencia de salida máxima: 335 VA</p>
                                <p>Eficiencia máxima: 96.5% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/fronius.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>FRONIUS</strong></p>
                                <p>Modelo: ADVANCED 15.0-24.0 LITE</p>
                                <p>Inversor: Inversor Central </p>
                                <p>Número de MPPT: 2</p>
                                <p>Potencia de salida máxima: 208 V</p>
                                <p>Eficiencia máxima: 97% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/fronius.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>FRONIUS</strong></p>
                                <p>Modelo: SYMO 15.0-3kW</p>
                                <p>Inversor: Inversor Central </p>
                                <p>Número de MPPT: 2</p>
                                <p>Potencia de salida máxima: 208 V</p>
                                <p>Eficiencia máxima: 97% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/fronius.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>FRONIUS</strong></p>
                                <p>Modelo: ADVANCED 10.0-24.0</p>
                                <p>Inversor: Inversor Central </p>
                                <p>Número de MPPT: 2</p>
                                <p>Potencia de salida máxima: 208 V</p>
                                <p>Eficiencia máxima: 97% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/fronius.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>FRONIUS</strong></p>
                                <p>Modelo: SYMO 10.0-15.0 LITE</p>
                                <p>Inversor: Inversor Central </p>
                                <p>Potencia de salida máxima: 204</p>
                                <p>Eficiencia máxima: 97.9% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/sma.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>SMA</strong></p>
                                <p>Modelo: SUNNY BOY 3.0-US7.7-US</p>
                                <p>Inversor: Inversor Central </p>
                                <p>Potencia de salida máxima: 5200 VA</p>
                                <p>Eficiencia máxima: 97,3% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/goodwe.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>GOODWE</strong></p>
                                <p>Modelo: ES-US SERIES</p>
                                <p>Inversor: Inversor Central </p>
                                <p>Potencia de salida máxima: </p>
                                <p>Eficiencia máxima: 97.6% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/goodwe.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>GOODWE</strong></p>
                                <p>Modelo: SMT-US 50/60kW Three Phase</p>
                                <p>Inversor: Inversor Central </p>
                                <p>Potencia de salida máxima: </p>
                                <p>Eficiencia máxima: 98.5% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/goodwe_GW5000.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>GOODWE</strong></p>
                                <p>Modelo: GW5000-MS</p>
                                <p>Inversor: Inversor Central </p>
                                <p>Potencia de salida máxima: </p>
                                <p>Eficiencia máxima: 97.7% </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="card card-estandar1" style="width: 18rem;">
                            <img src="{{asset('assets/img/img_info/goodwe_dns.jpg')}}" class="card-img-top" alt="card4">
                            <div class="card-body">
                                <p class="card-text">Marca: <strong>GOODWE</strong></p>
                                <p>Modelo: SERIE DNS</p>
                                <p>Inversor: Inversor Central </p>
                                <p>Potencia de salida máxima: </p>
                                <p>Eficiencia máxima: 97.8% </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 ">
                        <div class="col-md-12 d-flex justify-content-end">
                            <a href="#carruselInfo"><button class="btn btn-azul2"><i class="uil uil-arrow-up"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Finaliza sección de información sobre los inversores-->

        <!--Inicia sección de información adicional-->
        <section id="qrInfo">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
                <h3 class="subtitle-window">Información adicional</h3>
            </div>
            <div>
                <p>Escanea cualquiera de los siguientes códigos para obtener información adicional</p>
            </div>
            <div class="mt-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header">
                                <p><strong>Axitec</strong></p>
                            </div>
                            <div class="card-body">
                                <a href="https://www.axitecsolar.com/es/downloads-solarmodule-garantien-ce-konformitaet" target="_blank">
                                    <img src="{{asset('assets/img/img_qr/QR_Axitec.png')}}" class="qr1" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header">
                                <p><strong>Jinko</strong></p>
                            </div>
                            <div class="card-body">
                                <a href="https://www.jinkosolar.com/en/site/dwinstall" target="_blank">
                                    <img src="{{asset('assets/img/img_qr/QR_Jinko.png')}}" class="qr1" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header">
                                <p><strong>Sunfer</strong></p>
                            </div>
                            <div class="card-body">
                                <a href="https://sunferenergy.com/wp-content/uploads/Manual-de-Usuario-Sunfer-Project.pdf" target="_blank">
                                    <img src="{{asset('assets/img/img_qr/QR_Sunfer.png')}}" class="qr1" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header">
                                <p><strong>Everest</strong></p>
                            </div>
                            <div class="card-body">
                                <a href="https://catalog.k2-systems.com/es-mx/sistemas-de-montaje/" target="_blank">
                                    <img src="{{asset('assets/img/img_qr/QR_K2.png')}}" class="qr1" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header">
                                <p><strong>APsystems</strong></p>
                            </div>
                            <div class="card-body">
                                <a href="https://latam.apsystems.com/en/resources/library/#hojas" target="_blank">
                                    <img src="{{asset('assets/img/img_qr/QR_APS.png')}}" class="qr1" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header">
                                <p><strong>Enphase</strong></p>
                            </div>
                            <div class="card-body">
                                <a href="https://enphase.com/es-mx/installers/microinverters" target="_blank">
                                    <img src="{{asset('assets/img/img_qr/QR_Enphase.png')}}" class="qr1" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header">
                                <p><strong>Fronius</strong></p>
                            </div>
                            <div class="card-body">
                                <a href="https://www.fronius.com/es-es/spain/energia-solar/instaladores-y-socios/resumen-de-datos-tecnicos?filter=3522"
                                target="_blank">
                                    <img src="{{asset('assets/img/img_qr/QR_Fronius.png')}}" class="qr1" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header">
                                <p><strong>SMA</strong></p>
                            </div>
                            <div class="card-body">
                                <a href="https://www.sma.de/es/productos/inversor-fotovoltaico/sunny-boy-30-36-40-50-60"
                                   target="_blank">
                                    <img src="{{asset('assets/img/img_qr/QR_SMA.png')}}" class="qr1" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-2">
                        <div class="card w-100" style="width: 18rem;">
                            <div class="card-header">
                                <p><strong>Goodwe</strong></p>
                            </div>
                            <div class="card-body">
                                <a href="https://es.goodwe.com/products" target="_blank">
                                    <img src="{{asset('assets/img/img_qr/QR_Goodwe.png')}}" class="qr1" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2 ">
                        <i><p>Nota: Para más información consulte el manual de capacitación</p></i>

                        <div class="col-md-12 d-flex justify-content-end">
                            <a href="#carruselInfo"><button class="btn btn-azul2"><i class="uil uil-arrow-up"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Finaliza sección de información adicional-->
    </div>
@endsection


