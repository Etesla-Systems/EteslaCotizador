<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="position-sticky pt-3 p-3">
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <a class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#cotizador-clpse" aria-expanded="true">
                    <i class="uil uil-chart icon-sidebar"></i>
                    <span>Cotizador</span>
                </a>
                <div class="collapse show" id="cotizador-clpse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li class="px-3 py-1"><a href="#" class="link-dark rounded simple-text">Media Tensi&oacute;n</a></li>
                        <li class="px-3 py-1"><a href="/bajatension" class="link-dark rounded simple-text">Baja Tensi&oacute;n</a></li>
                        <li class="px-3 py-1"><a href="#" class="link-dark rounded simple-text">Individual</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <a href="/clientes" class="btn btn-toggle align-items-center rounded">
                    <i class="uil uil-users-alt icon-sidebar"></i>
                    <span>Clientes</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="profile dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dpUser" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/img/avatar.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <span class="user-profile">Usuario</span>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dpUser">
            <li><a class="dropdown-item simple-text" href="#">Editar Perfil</a></li>
        </ul>
    </div>
</nav>