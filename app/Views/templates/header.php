<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid px-lg-5 px-3">

        <a class="navbar-brand d-flex align-items-center"
           href="<?= base_url('/') ?>">
            <span class="estrella-logo">✦</span>
            <span class="marca">MYSTERY JEWELRY</span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuPrincipal"
                aria-controls="menuPrincipal"
                aria-expanded="false"
                aria-label="Abrir menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">

            <ul class="navbar-nav mx-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">
                        INICIO
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('productos') ?>">
                        PRODUCTOS
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>#contacto">
                        CONTACTO
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center navbar-icons">

                <div class="search-box" id="searchBox">
                    <form action="<?= base_url('productos') ?>" method="get">
                        <input
                            type="search"
                            name="buscar"
                            id="searchInput"
                            placeholder="Busca tu joya ideal"
                            autocomplete="off"
                        >
                    </form>

                    <button type="button"
                            class="icono-nav search-toggle"
                            id="searchToggle"
                            aria-label="Abrir búsqueda">
                        <i class="bi bi-search"></i>
                    </button>
                </div>

                <a href="<?= base_url('carrito') ?>" class="icono-nav">
                    <i class="bi bi-bag"></i>
                </a>

            </div>
        </div>
    </div>
</nav>

