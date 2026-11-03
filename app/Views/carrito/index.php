<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi carrito | Mystery Jewelry</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f8f7f4;
            color: #292724;
            font-family: 'DM Sans', sans-serif;
        }

        /* ENCABEZADO MYSTERY JEWELRY */
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

        .navbar .nav-link:hover {
            color: #888;
        }

        .iconos a {
            color: #222;
            font-size: 18px;
            margin-left: 18px;
        }

        .navbar-toggler {
            border-color: #c9c3bb;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* CARRITO */
        .carrito-contenedor {
            max-width: 1150px;
            margin: 45px auto;
            padding: 0 25px;
        }

        .volver {
            color: #756456;
            text-decoration: none;
            font-size: 13px;
        }

        .titulo-carrito {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            margin: 25px 0 30px;
        }

        .carrito-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 45px;
            align-items: start;
        }

        .producto-carrito {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid #dedbd5;
        }

        .producto-carrito img {
            width: 115px;
            height: 115px;
            object-fit: cover;
            background: #e9e6e1;
        }

        .producto-info {
            flex: 1;
        }

        .producto-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .producto-info p {
            color: #77716b;
            font-size: 13px;
            margin: 5px 0;
        }

        .producto-precio {
            font-size: 14px;
            white-space: nowrap;
        }

        /* CANTIDAD */
.controles-cantidad {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    gap: 14px;
    margin-top: 10px;
    padding: 4px 6px;
    border: 1px solid #c9beb2;
    border-radius: 50px;
    background: #f8f7f4;
    min-width: 135px;
}

.controles-cantidad form {
    margin: 0;
}

.boton-cantidad {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    border: none;
    border-radius: 50%;
    background: #eee8e1;
    color: #292724;
    font-size: 17px;
    cursor: pointer;
    transition: background 0.2s ease;
}

.boton-cantidad:hover {
    background: #ded5ca;
}


        /* RESUMEN */
        .resumen {
            background: #e9e6e1;
            padding: 25px;
        }

        .resumen h3 {
            font-family: 'Playfair Display', serif;
            font-size: 21px;
            margin-bottom: 25px;
        }

        .resumen-linea {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 17px;
        }

        .resumen-total {
            border-top: 1px solid #c9c3bb;
            padding-top: 18px;
            margin-top: 20px;
            font-weight: bold;
            font-size: 17px;
        }

        .boton-compra {
            display: block;
            width: 100%;
            background: #292724;
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
            font-size: 13px;
            letter-spacing: 1px;
            margin-top: 25px;
        }

        .boton-compra:hover {
            background: #756456;
            color: white;
        }

        .ayuda {
            margin-top: 30px;
            border-top: 1px solid #c9c3bb;
            padding-top: 20px;
            font-size: 13px;
        }

        .ayuda p {
            color: #756456;
            margin-top: 12px;
        }

        .seguir {
            display: inline-block;
            margin-top: 25px;
            color: #756456;
            font-size: 13px;
        }

        .carrito-vacio {
            padding: 30px 0;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .iconos {
                padding-top: 10px;
            }
        }

        @media (max-width: 750px) {
            .carrito-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .producto-carrito {
                gap: 12px;
            }

            .producto-carrito img {
                width: 85px;
                height: 85px;
            }
        }

        @media (max-width: 520px) {
            .marca {
                font-size: 11px;
                letter-spacing: 2px;
            }
        }
    </style>
</head>

<body>

<!-- ENCABEZADO -->
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

<!-- CONTENIDO DEL CARRITO -->
<!-- CONTENIDO DEL CARRITO -->
<div class="carrito-contenedor">

    <a href="<?= site_url('productos') ?>" class="volver">
        ← Seguir comprando
    </a>

    <h1 class="titulo-carrito">Mi carrito</h1>

    <?php if (!empty($productos)): ?>

        <?php $total = 0; ?>

        <div class="carrito-layout">

            <!-- SECCIÓN IZQUIERDA: LISTA DE PRODUCTOS -->
            <section>
                <?php foreach ($productos as $producto): ?>
                    <?php
                        $id = $producto['id_productos'];
                        // Forzamos el precio a flotante o entero por seguridad
                        $precio = (float) $producto['precio']; 
                        $cantidad = (int) $producto['cantidad'];
                        $subtotalProducto = $precio * $cantidad;
                        $total += $subtotalProducto;
                    ?>

                    <div class="producto-carrito">
                        <!-- Imagen del producto desde tu BD -->
                        <img src="<?= base_url('uploads/' . $producto['imagen']) ?>" alt="<?= esc($producto['nombre']) ?>">
                        
                        <div class="producto-info">
                            <h3><?= esc($producto['nombre']) ?></h3>
                            <p class="text-muted">Código: #<?= $id ?></p>
                            
                            <!-- Controles de Cantidad conectados al Backend -->
                            <!-- Controles de Cantidad conectados a tus rutas reales -->
<div class="controles-cantidad">
    
    <!-- Botón Disminuir (-) -->
    <form action="<?= site_url('carrito/disminuir/' . $id) ?>" method="POST">
        <button type="submit" class="boton-cantidad">-</button>
    </form>

    <span><?= $cantidad ?></span>

    <!-- Botón Aumentar (+) -->
    <form action="<?= site_url('carrito/aumentar/' . $id) ?>" method="POST">
        <button type="submit" class="boton-cantidad">+</button>
    </form>
    
</div>


                        <!-- Precio Total por esa Fila de Producto -->
                        <div class="producto-precio fw-medium">
                            $ <?= number_format($subtotalProducto, 0, ',', '.') ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>

            <!-- SECCIÓN DERECHA: RESUMEN DE COMPRA -->
            <aside class="resumen">
                <h3>Resumen del pedido</h3>
                
                <div class="resumen-linea">
                    <span>Subtotal</span>
                    <span>$ <?= number_format($total, 0, ',', '.') ?></span>
                </div>
                
                <div class="resumen-linea">
                    <span>Envío</span>
                    <span class="text-success">Gratis</span>
                </div>

                <div class="resumen-linea resumen-total">
                    <span>Total</span>
                    <span>$ <?= number_format($total, 0, ',', '.') ?></span>
                </div>

                <a href="<?= site_url('checkout') ?>" class="boton-compra text-uppercase fw-semibold">
                    Iniciar Compra
                </a>

                <div class="ayuda">
                    <span class="fw-semibold">¿Necesitás ayuda?</span>
                    <p>Escribinos por WhatsApp ante cualquier duda con tu pago o pedido.</p>
                </div>
            </aside>

        </div>

    <?php else: ?>
        <!-- ESTADO CUANDO EL CARRITO ESTÁ VACÍO -->
        <div class="carrito-vacio text-center my-5">
            <i class="bi bi-bag-x text-muted" style="font-size: 3rem;"></i>
            <p class="mt-3 text-muted">Tu carrito está vacío en este momento.</p>
            <a href="<?= site_url('productos') ?>" class="btn btn-dark rounded-0 px-4 mt-2 text-uppercase" style="font-size: 0.85rem; letter-spacing: 1px;">
                Ver Productos
            </a>
        </div>
    <?php endif; ?>

</div>

<!-- Scripts de Bootstrap (Necesarios para que funcione el Navbar responsive en tu diseño) -->
<script src="https://jsdelivr.net"></script>

</body>
</html>
