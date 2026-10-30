<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mystery Jewelry</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <!-- Tipografías -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Playfair+Display:wght@400;500&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --blanco: #f8f7f4;
            --beige: #e9e6e1;
            --gris: #d7d4cf;
            --gris-texto: #777570;
            --negro: #191919;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--blanco);
            color: var(--negro);
            font-family: 'DM Sans', sans-serif;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* NAVEGACIÓN */

        .navbar {
            min-height: 60px;
            background: var(--blanco);
            border-bottom: 1px solid #e5e2de;
        }

        .marca {
            font-size: 16px;
            letter-spacing: 5px;
            font-weight: 400;
            white-space: nowrap;
        }

        .estrella-logo {
            font-size: 25px;
            margin-right: 10px;
        }

        .navbar .nav-link {
            color: var(--negro);
            font-size: 10px;
            letter-spacing: 1px;
            padding: 10px 13px !important;
        }

        .navbar .nav-link:hover {
            color: var(--gris-texto);
        }

        .icono-nav {
            font-size: 18px;
            margin-left: 15px;
        }

        /* PORTADA */

        .portada {
            min-height: 360px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            background-color: #f8f7f4;

            background-image:
                linear-gradient(
                    90deg,
                    rgba(248,247,244,0.98) 0%,
                    rgba(248,247,244,0.90) 25%,
                    rgba(248,247,244,0.55) 42%,
                    rgba(248,247,244,0.12) 58%,
                    rgba(248,247,244,0) 72%
                ),
                url('<?= base_url("img/portada.png") ?>');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .contenido-portada {
            padding-top: 24px;
            padding-bottom: 24px;
            position: relative;
            z-index: 1;
        }

        .subtitulo {
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .titulo-portada {
            font-family: 'Playfair Display', serif;
            font-size: clamp(38px, 4vw, 55px);
            line-height: 1.1;
            margin-bottom: 12px;
        }

        .frase-portada {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            font-style: italic;
            line-height: 1.5;
            margin-bottom: 19px;
        }

        .boton-negro {
            display: inline-block;
            background: var(--negro);
            color: white;
            padding: 11px 21px;
            font-size: 10px;
            letter-spacing: 1.5px;
            border: 1px solid var(--negro);
            transition: .3s;
        }

        .boton-negro:hover {
            background: transparent;
            color: var(--negro);
        }

        .boton-negro i {
            margin-left: 12px;
        }

        .estrella-portada {
            position: absolute;
            top: 30px;
            left: 18px;
            font-size: 25px;
        }

        /* BENEFICIOS */

        .beneficios {
            background: #eeece8;
            padding: 19px 0;
        }

        .beneficio {
            text-align: center;
            padding: 0 12px;
        }

        .beneficio:not(:last-child) {
            border-right: 1px solid #cfccc7;
        }

        .beneficio i {
            display: block;
            font-size: 23px;
            margin-bottom: 8px;
        }

        .beneficio h3 {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        .beneficio p {
            color: var(--gris-texto);
            font-size: 11px;
            line-height: 1.5;
            margin-bottom: 0;
        }

        /* CATEGORÍAS */

        .seccion-categorias {
            padding: 21px 0 24px;
        }

        .titulo-seccion {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 18px;
            margin-bottom: 18px;
        }

        .titulo-seccion span {
            width: 65px;
            height: 1px;
            background: #55534f;
        }

        .titulo-seccion h2 {
            font-size: 18px;
            font-weight: 400;
            letter-spacing: 5px;
            margin: 0;
        }

        .categoria {
            display: block;
            background: var(--beige);
            overflow: hidden;
        }

        .categoria img {
            display: block;
            width: 100%;
            height: 125px;
            object-fit: cover;
            transition: transform .4s;
        }

        .categoria:hover img {
            transform: scale(1.05);
        }

        .nombre-categoria {
            min-height: 34px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            background: #e3e0dc;
            font-size: 10px;
            letter-spacing: 2px;
            transition: background .3s;
        }

        .categoria:hover .nombre-categoria {
            background: #d4d0ca;
        }

        /* ESTRELLAS DECORATIVAS */

        .detalle-print {
            position: relative;
        }

        .detalle-print::after {
            content: "✦";
            position: absolute;
            top: 7px;
            right: 9px;
            color: white;
            font-size: 19px;
            text-shadow: 0 1px 5px #333;
            pointer-events: none;
        }

        /* PIE DE PÁGINA */

        .pie-pagina {
            min-height: 55px;
            background: #e2dfda;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 18px;
        }

        .pie-pagina a {
            font-size: 16px;
            transition: opacity .3s;
        }

        .pie-pagina a:hover {
            opacity: .5;
        }

        .linea-pie {
            width: 32px;
            height: 1px;
            background: #85817a;
        }

        /* TABLETS */

        @media (max-width: 991px) {
            .marca {
                font-size: 14px;
                letter-spacing: 3px;
            }

            .navbar .nav-link {
                padding: 9px 0 !important;
            }

            .icono-nav {
                margin: 10px 12px 10px 0;
            }

            .beneficio {
                padding: 12px 8px;
                border-right: none !important;
            }

            .categoria img {
                height: 145px;
            }
        }

        /* CELULARES */

        @media (max-width: 575px) {
            .navbar {
                padding: 8px 0;
            }

            .marca {
                font-size: 12px;
                letter-spacing: 2px;
            }

            .estrella-logo {
                font-size: 21px;
                margin-right: 6px;
            }

            .portada {
                min-height: 280px;
                background-position: 58% center;
            }

            .contenido-portada {
                padding-left: 22px;
            }

            .titulo-portada {
                font-size: 37px;
            }

            .subtitulo {
                font-size: 9px;
                letter-spacing: 1.5px;
            }

            .frase-portada {
                font-size: 15px;
            }

            .beneficio h3 {
                font-size: 9px;
                letter-spacing: .7px;
            }

            .beneficio p {
                font-size: 10px;
            }

            .titulo-seccion {
                gap: 10px;
            }

            .titulo-seccion span {
                width: 28px;
            }

            .titulo-seccion h2 {
                font-size: 16px;
                letter-spacing: 3px;
            }

            .categoria img {
                height: 115px;
            }

            .nombre-categoria {
                font-size: 9px;
                letter-spacing: 1px;
            }
        }
    </style>
</head>

<body>

<!-- NAVEGACIÓN -->

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
                    <a class="nav-link"
                       href="<?= base_url('productos') ?>">
                        PRODUCTOS
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contacto">
                        CONTACTO
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <a href="<?= base_url('productos') ?>"
                   class="icono-nav" aria-label="Buscar productos">
                    <i class="bi bi-search"></i>
                </a>

                <a href="<?= base_url('login') ?>"
                   class="icono-nav" aria-label="Iniciar sesión">
                    <i class="bi bi-person"></i>
                </a>

                <a href="<?= base_url('register') ?>"
                   class="icono-nav" aria-label="Registrarse">
                    <i class="bi bi-bag"></i>
                </a>
            </div>

        </div>
    </div>
</nav>


<!-- PORTADA -->

<header class="portada">
    <span class="estrella-portada">✦</span>

    <div class="container contenido-portada">
        <div class="row">
            <div class="col-lg-6 col-md-8">

                <p class="subtitulo">
                    Joyas que hacen brillar tu esencia
                </p>

                <h1 class="titulo-portada">
                    Mystery Jewelry
                </h1>

                <p class="frase-portada">
                    Detalles que transforman<br>
                    lo cotidiano en algo especial.
                </p>

                <a href="<?= base_url('productos') ?>"
                   class="boton-negro">
                    VER PRODUCTOS
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>
        </div>
    </div>
</header>


<!-- BENEFICIOS -->

<section class="beneficios">
    <div class="container-fluid px-lg-5">
        <div class="row">

            <div class="col-6 col-lg-3 beneficio">
                <i class="bi bi-truck"></i>
                <h3>Envíos a todo el país</h3>
                <p>Recibí tu pedido en la comodidad de tu hogar.</p>
            </div>

            <div class="col-6 col-lg-3 beneficio">
                <i class="bi bi-shield-check"></i>
                <h3>Compra segura</h3>
                <p>Tus datos y pagos están protegidos.</p>
            </div>

            <div class="col-6 col-lg-3 beneficio">
                <i class="bi bi-star"></i>
                <h3>Calidad garantizada</h3>
                <p>Joyas de acero inoxidable y materiales premium.</p>
            </div>

            <div class="col-6 col-lg-3 beneficio">
                <i class="bi bi-heart"></i>
                <h3>Atención personalizada</h3>
                <p>Estamos para ayudarte en lo que necesites.</p>
            </div>

        </div>
    </div>
</section>


<!-- CATEGORÍAS -->

<section class="seccion-categorias" id="categorias">
    <div class="container-fluid px-lg-5 px-3">

        <div class="titulo-seccion">
            <span></span>
            <h2>CATEGORÍAS</h2>
            <span></span>
        </div>

        <div class="row g-3">

            <div class="col-6 col-lg-3">
                <a href="<?= base_url('productos?categoria=collares') ?>"
                   class="categoria">
                   <img src="<?= base_url('img/collar.jpg') ?>"
     alt="Collar plateado"
     class="img-fluid w-100 imagen-categoria">
                    <div class="nombre-categoria">
                        COLLARES <i class="bi bi-arrow-right"></i>
                    </div>
                </a>
            </div>


<div class="col-6 col-lg-3">
    <a href="<?= base_url('productos?categoria=anillos') ?>" class="categoria">
        <img src="<?= base_url('img/anillo.png') ?>"
             alt="Anillos plateados">

        <div class="nombre-categoria">
            ANILLOS <i class="bi bi-arrow-right"></i>
        </div>
    </a>
</div>


            <div class="col-6 col-lg-3">
                <a href="<?= base_url('productos?categoria=pulseras') ?>"
                   class="categoria">
                    <img src="<?= base_url('img/pulsera.jpg') ?>"
     alt="Pulsera plateada con estrella sobre fondo animal print"
     class="img-fluid w-100 imagen-categoria">
                    <div class="nombre-categoria">
                        PULSERAS <i class="bi bi-arrow-right"></i>
                    </div>
                </a>
            </div>

           <div class="col-6 col-lg-3">
    <a href="<?= base_url('productos?categoria=aros') ?>" class="categoria">
        <img src="<?= base_url('img/aros.jpg') ?>"
             alt="Aros plateados">

        <div class="nombre-categoria">
            AROS <i class="bi bi-arrow-right"></i>
        </div>
    </a>
</div>

        </div>
    </div>
</section>


<!-- PIE DE PÁGINA -->

<footer class="pie-pagina" id="contacto">
    <span class="linea-pie"></span>

    <a href="#" aria-label="Instagram">
        <i class="bi bi-instagram"></i>
    </a>

    <a href="#" aria-label="Pinterest">
        <i class="bi bi-pinterest"></i>
    </a>

    <a href="#" aria-label="TikTok">
        <i class="bi bi-tiktok"></i>
    </a>

    <span class="linea-pie"></span>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>