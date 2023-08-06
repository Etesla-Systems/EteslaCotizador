<div class="l-navbar" id="nav-bar">
    <nav class="nav sidebar">
        <div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav_logo nav-link">
                        <i class='bx bx-dollar'></i>
                        <span class="nav_logo-name"><strong>COTIZADOR</strong></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/vendedor') }}" class="nav_link active">
                        <i class='bx bxs-home'></i>
                        <span class="nav_name">Inicio</span>
                    </a>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav_link" href="#">
                        <i class='bx bx-briefcase nav_icon'></i>
                        <span class="nav_name">Procesos</span>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav_link" href="{{ url('bajaTension') }}">
                                <i class='bx bx-trending-down nav_icon'></i>
                                <span class="nav_name">Baja Tensi&oacute;n</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="#">
                                <i class='bx bx-trending-up nav_icon'></i>
                                <span class="nav_name">Media Tensi&oacute;n</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="{{ url('individual') }}">
                                <i class='bx bx-smile nav_icon'></i>
                                <span class="nav_name">Individual</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a class="nav_link" href="#">
                        <i class='bx bx-category nav_icon'></i>
                        <span class="nav_name">Cat&aacute;logos</span>
                    </a>
                    <ul class="submenu collapse">
                        <li>
                            <a class="nav_link" href="{{ url('clientes') }}">
                                <i class='bx bx-face nav_icon'></i>
                                <span class="nav_name">Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="">
                                <i class='bx bx-buildings nav_icon'></i>
                                <span class="nav_name">Oficinas</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="">
                                <i class='bx bx-coin nav_icon'></i>
                                <span class="nav_name">Tarifas</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="">
                                <i class='bx bx-group nav_icon'></i>
                                <span class="nav_name">Roles</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="#">
                                <i class='bx bx-user nav_icon'></i>
                                <span class="nav_name">Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="#">
                                <i class='bx bx-shopping-bag nav_icon'></i>
                                <span class="nav_name">Agregados</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="#">
                                <i class='bx bx-cog nav_icon'></i>
                                <span class="nav_name">Estructuras</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="#">
                                <i class='bx bx-microchip nav_icon'></i>
                                <span class="nav_name">Inversores</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav_link" href="#">
                                <i class='bx bx-sun nav_icon'></i>
                                <span class="nav_name">Paneles</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <a class="nav_link" href="/logout"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar Sesi&oacute;n</span> </a>
    </nav>
</div>
