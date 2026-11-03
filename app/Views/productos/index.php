<?php
$productos = $productos ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos | Mystery Jewelry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f8f7f4;
            color: #222;
            font-family: 'DM Sans', sans-serif;
        }

        /* ENCABEZADO */
        .navbar {
            background: #f8f7f4;
            border-bottom: 1px solid #e5e2de;
            padding: 15px 4%;
        }

        .marca {
            color: #222;
            text-decoration: none;
            font-size: 15px;
            letter-spacing: 4px;
            white-space: nowrap;
        }

        .estrella {
            font-size: 24px;
            margin-right: 9px;
        }

        .navbar .nav-link {
            color: #222;
            font-size: 10px;
            letter-spacing: 1.5px;
            padding: 10px 14px;
        }

        .navbar .nav-link:hover { color: #888; }

        .iconos a {
            color: #222;
            font-size: 18px;
            margin-left: 18px;
        }

        /* BANNER */
        .banner {
            min-height: 280px;
            padding: 38px 6%;
            display: flex;
            align-items: center;
            background-image:
                linear-gradient(90deg, rgba(248,247,244,0.85), rgba(248,247,244,0.15)),
                url("<?= base_url('img/banner-productos.png') ?>");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .banner h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(34px, 4vw, 48px);
            font-weight: 400;
            margin: 5px 0 10px;
        }

        .banner p {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            font-style: italic;
            margin: 0;
        }

        /* CATÁLOGO */
        .catalogo {
            max-width: 1400px;
            margin: 30px auto;
            padding: 0 4%;
        }

        .barra-filtros {
            background: #e9e6e1;
            padding: 12px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .filtros {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }

        .filtros button {
            border: 0;
            border-bottom: 1px solid transparent;
            background: transparent;
            padding: 8px 0;
            font-size: 10px;
            letter-spacing: 1.5px;
        }

        .filtros button.activo,
        .filtros button:hover {
            border-bottom-color: #222;
        }

        .orden {
            background: transparent;
            border: 1px solid #c7c2bb;
            padding: 8px;
            font-size: 10px;
            max-width: 180px;
        }

        /* TARJETAS */
        .productos-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px 14px;
        }

        .producto {
            min-width: 0;
            border: 1px solid #dedbd5;
            padding: 10px;
            display: flex;
            flex-direction: column;
            background: #f8f7f4;
        }

        .producto-imagen {
            width: 100%;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            background: #e9e6e1;
        }

        .producto-imagen img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .producto-info {
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 13px 5px 4px;
        }

        .producto h2 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 400;
            margin: 0 0 10px;
        }

        .descripcion {
            font-size: 12px;
            color: #777;
            line-height: 1.7;
            margin-bottom: 14px;
        }

        .precio {
            font-size: 17px;
            margin-top: auto;
            margin-bottom: 12px;
        }

        .boton-carrito {
            display: block;
            width: 100%;
            border: 1px solid #222;
            background: #222;
            color: white;
            padding: 12px 8px;
            font-size: 9px;
            letter-spacing: 1px;
            text-align: center;
        }

        .boton-carrito:hover {
            background: transparent;
            color: #222;
        }

        .sin-productos {
            grid-column: 1 / -1;
            padding: 50px 15px;
            text-align: center;
            color: #777;
        }

        /* PIE */
        footer {
            background: #e2dfda;
            padding: 22px;
            text-align: center;
        }

        footer a {
            color: #333;
            font-size: 17px;
            margin: 0 10px;
        }

        /* NOTIFICACIÓN VERTICAL DEL CARRITO */
        .notificacion-carrito {
            position: fixed;
            top: 85px;
            right: 25px;
            z-index: 9999;
            width: 230px;
            background: #f5f4f2;
            border: 1px solid #d2cfcb;
            border-radius: 12px;
            padding: 18px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            animation: aparecerNotificacion .35s ease;
        }

        .notificacion-carrito img {
            width: 100%;
            height: 190px;
            object-fit: cover;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        .notificacion-info {
            width: 100%;
        }

        .notificacion-info h4 {
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            color: #292724;
            margin: 0 0 10px;
        }

        .notificacion-info p {
            font-size: 13px;
            color: #666;
            margin: 0 0 15px;
        }

        .notificacion-info a {
            color: #fff;
            background: #333;
            font-size: 10px;
            letter-spacing: 1px;
            text-decoration: none;
            padding: 12px;
            display: block;
        }

        .notificacion-info a:hover {
            background: #666;
        }

        .cerrar-notificacion {
            position: absolute;
            top: 7px;
            right: 10px;
            border: none;
            background: transparent;
            color: #555;
            font-size: 20px;
            cursor: pointer;
        }

        @keyframes aparecerNotificacion {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 450px) {
            .notificacion-carrito {
                width: 210px;
                right: 15px;
                top: 80px;
            }
        }

        @media (max-width: 800px) {
            .productos-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .barra-filtros { align-items: flex-start; flex-direction: column; }
            .filtros { gap: 16px; }
            .iconos { padding-top: 10px; }
        }

        @media (max-width: 520px) {
            .marca { font-size: 11px; letter-spacing: 2px; }
            .banner { min-height: 190px; padding: 28px 6%; }
            .banner h1 { font-size: 33px; }
            .catalogo { padding: 0 12px; margin-top: 20px; }
            .productos-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; }
            .producto { padding: 7px; }
            .producto h2 { font-size: 16px; }
            .descripcion { font-size: 11px; }
            .precio { font-size: 15px; }
            .boton-carrito { font-size: 8px; letter-spacing: 0; padding: 10px 3px; }
        }

        .banner {
            background-image: url("<?= base_url('img/banner-productos.png') ?>");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 280px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid p-0">

        <a class="navbar-brand marca d-flex align-items-center" href="<?= site_url('/') ?>">
            <span class="estrella">✦</span>
            MYSTERY JEWELRY
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menuPrincipal"
                aria-label="Abrir menú">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/') ?>">INICIO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('productos') ?>">PRODUCTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/') ?>#contacto">CONTACTO</a>
                </li>
            </ul>

            <div class="iconos d-flex align-items-center">
                <a href="<?= site_url('productos') ?>" aria-label="Buscar">
                    <i class="bi bi-search"></i>
                </a>
                <a href="<?= site_url('login') ?>" aria-label="Mi cuenta">
                    <i class="bi bi-person"></i>
                </a>
                <a href="<?= site_url('carrito') ?>" aria-label="Carrito">
                    <i class="bi bi-bag"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<header class="banner">
    <div>
        <div>✦</div>
        <h1>Nuestros productos</h1>
        <p>Piezas únicas para acompañarte todos los días.</p>
    </div>
</header>

<main class="catalogo">

    <div class="barra-filtros">
        <div class="filtros">
            <button type="button" class="activo" data-categoria="todos">TODOS</button>
            <button type="button" data-categoria="collares">COLLARES</button>
            <button type="button" data-categoria="anillos">ANILLOS</button>
            <button type="button" data-categoria="pulseras">PULSERAS</button>
            <button type="button" data-categoria="aros">AROS</button>
        </div>

        <select class="orden" id="ordenar">
            <option value="original">ORDENAR POR</option>
            <option value="asc">PRECIO: MENOR A MAYOR</option>
            <option value="desc">PRECIO: MAYOR A MENOR</option>
            <option value="nombre">NOMBRE</option>
        </select>
    </div>

    <div class="productos-grid" id="productosGrid">

        <?php if (count($productos) > 0): ?>
            <?php foreach ($productos as $producto): ?>
                <?php
                    $nombre = $producto['nombre'] ?? 'Producto';
                    $descripcion = $producto['descripcion'] ?? '';
                    $imagen = basename($producto['imagen'] ?? '');
                    $precio = (float) ($producto['precio'] ?? 0);

                    $texto = function_exists('mb_strtolower')
                        ? mb_strtolower($nombre . ' ' . $descripcion)
                        : strtolower($nombre . ' ' . $descripcion);

                    $categoria = 'otros';

                    if (strpos($texto, 'collar') !== false || strpos($texto, 'cadena') !== false) {
                        $categoria = 'collares';
                    } elseif (strpos($texto, 'anillo') !== false) {
                        $categoria = 'anillos';
                    } elseif (strpos($texto, 'pulsera') !== false) {
                        $categoria = 'pulseras';
                    } elseif (
                        strpos($texto, 'aro') !== false ||
                        strpos($texto, 'arete') !== false ||
                        strpos($texto, 'argolla') !== false ||
                        strpos($texto, 'trepador') !== false
                    ) {
                        $categoria = 'aros';
                    }

                    $idProducto = (int) ($producto['id_productos'] ?? 0);
                    $urlImagen = $imagen !== ''
                        ? base_url('img/productos/' . rawurlencode($imagen))
                        : '';
                ?>

                <article class="producto"
                         data-categoria="<?= esc($categoria) ?>"
                         data-nombre="<?= esc($nombre) ?>"
                         data-precio="<?= esc((string) $precio) ?>">

                    <div class="producto-imagen">
                        <?php if ($urlImagen !== ''): ?>
                            <img src="<?= esc($urlImagen) ?>"
                                 alt="<?= esc($nombre) ?>"
                                 loading="lazy">
                        <?php else: ?>
                            <div class="d-flex h-100 align-items-center justify-content-center">
                                <span>✦ MYSTERY JEWELRY</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="producto-info">
                        <h2><?= esc($nombre) ?></h2>

                        <?php if (trim($descripcion) !== ''): ?>
                            <p class="descripcion"><?= esc($descripcion) ?></p>
                        <?php endif; ?>

                        <p class="precio">$ <?= number_format($precio, 0, ',', '.') ?></p>

                        <form action="<?= site_url('carrito/agregar/' . $idProducto) ?>" method="post">
                            <?= csrf_field() ?>
                            <button type="submit" class="boton-carrito">
                                <i class="bi bi-bag-plus"></i>
                                AGREGAR AL CARRITO
                            </button>
                        </form>
                    </div>
                </article>

            <?php endforeach; ?>
        <?php else: ?>
            <div class="sin-productos">
                <h2>No hay productos cargados</h2>
                <p>Agregá productos para que aparezcan en el catálogo.</p>
            </div>
        <?php endif; ?>

    </div>
</main>

<footer id="contacto">
    <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
    <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
    <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
const tarjetas = Array.from(document.querySelectorAll('.producto'));
const botones = document.querySelectorAll('.filtros button[data-categoria]');
const grid = document.getElementById('productosGrid');

// FILTROS DE CATEGORÍAS
botones.forEach(boton => {
    boton.addEventListener('click', () => {
        botones.forEach(b => b.classList.remove('activo'));
        boton.classList.add('activo');

        const categoria = boton.dataset.categoria;

        tarjetas.forEach(tarjeta => {
            tarjeta.style.display =
                categoria === 'todos' || tarjeta.dataset.categoria === categoria
                    ? 'flex'
                    : 'none';
        });
    });
});

// LEER LA CATEGORÍA QUE VIENE DESDE LA PÁGINA PRINCIPAL
const categoriaURL = new URLSearchParams(window.location.search).get('categoria');

if (categoriaURL) {
    const botonCategoria = document.querySelector(
        `.filtros button[data-categoria="${categoriaURL}"]`
    );

    if (botonCategoria) {
        botonCategoria.click();
    }
}

// ORDENAR PRODUCTOS
document.getElementById('ordenar').addEventListener('change', function () {
    const orden = this.value;
    const ordenadas = [...tarjetas];

    if (orden === 'asc') {
        ordenadas.sort((a, b) => Number(a.dataset.precio) - Number(b.dataset.precio));
    } else if (orden === 'desc') {
        ordenadas.sort((a, b) => Number(b.dataset.precio) - Number(a.dataset.precio));
    } else if (orden === 'nombre') {
        ordenadas.sort((a, b) => a.dataset.nombre.localeCompare(b.dataset.nombre));
    }

    ordenadas.forEach(tarjeta => grid.appendChild(tarjeta));
});
</script>

<?php if ($notificacion = session()->getFlashdata('notificacionCarrito')): ?>

<div class="notificacion-carrito" id="notificacionCarrito">

    <button class="cerrar-notificacion"
            onclick="cerrarNotificacion()">
        &times;
    </button>

    <?php if (!empty($notificacion['imagen'])): ?>
        <img
            src="<?= base_url('img/productos/' . esc($notificacion['imagen'])) ?>"
            alt="<?= esc($notificacion['nombre']) ?>"
        >
    <?php endif; ?>

    <div class="notificacion-info">

        <h4><?= esc($notificacion['nombre']) ?></h4>

        <p>Cantidad: <?= (int) $notificacion['cantidad'] ?></p>

        <a href="<?= site_url('carrito') ?>">
            VER CARRITO →
        </a>

    </div>

</div>

<script>
    function cerrarNotificacion() {
        const notificacion = document.getElementById('notificacionCarrito');

        if (notificacion) {
            notificacion.remove();
        }
    }

    setTimeout(cerrarNotificacion, 5000);
</script>

<?php endif; ?>

</body>
</html>
