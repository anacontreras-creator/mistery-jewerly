<?= view('templates/header') ?>

<style>
    body {
        background: #f8f7f4;
        color: #292724;
        font-family: 'DM Sans', sans-serif;
    }

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

    .controles-cantidad {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 12px;
    }

    .controles-cantidad form {
        margin: 0;
    }

    .boton-cantidad {
        width: 30px;
        height: 30px;
        border: 1px solid #c9c3bb;
        background: #f8f7f4;
        color: #292724;
        font-size: 18px;
        cursor: pointer;
    }

    .boton-cantidad:hover {
        background: #e9e6e1;
    }

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
</style>

<div class="carrito-contenedor">

    <a href="<?= site_url('productos') ?>" class="volver">
        ← Seguir comprando
    </a>

    <h1 class="titulo-carrito">Mi carrito</h1>

    <?php if (!empty($productos)): ?>

        <?php $total = 0; ?>

        <div class="carrito-layout">

            <section>

                <?php foreach ($productos as $producto): ?>

                    <?php
                    $id = $producto['id'];
                    $precio = (float) $producto['precio'];
                    $cantidad = (int) $producto['cantidad'];
                    $subtotal = $precio * $cantidad;
                    $total += $subtotal;
                    ?>

                    <article class="producto-carrito">

                        <img
                            src="<?= base_url('img/productos/' . $producto['imagen']) ?>"
                            alt="<?= esc($producto['nombre']) ?>"
                        >

                        <div class="producto-info">

                            <h3><?= esc($producto['nombre']) ?></h3>

                            <p>
                                <?= esc($producto['descripcion'] ?? '') ?>
                            </p>

                            <div class="controles-cantidad">

                                <form action="<?= site_url('carrito/disminuir/' . $id) ?>" method="post">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="boton-cantidad">−</button>
                                </form>

                                <span><?= $cantidad ?></span>

                                <form action="<?= site_url('carrito/aumentar/' . $id) ?>" method="post">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="boton-cantidad">+</button>
                                </form>

                            </div>

                        </div>

                        <div class="producto-precio">
                            $<?= number_format($subtotal, 0, ',', '.') ?>
                        </div>

                    </article>

                <?php endforeach; ?>

            </section>

            <aside>

                <div class="resumen">

                    <h3>Resumen de compra</h3>

                    <div class="resumen-linea">
                        <span>Subtotal</span>
                        <span>
                            $<?= number_format($total, 0, ',', '.') ?>
                        </span>
                    </div>

                    <div class="resumen-linea">
                        <span>Envío</span>
                        <span>A calcular</span>
                    </div>

                    <div class="resumen-linea resumen-total">
                        <span>Total</span>
                        <span>
                            $<?= number_format($total, 0, ',', '.') ?>
                        </span>
                    </div>

                    <a href="#" class="boton-compra">
                        FINALIZAR COMPRA
                    </a>

                </div>

                <div class="ayuda">
                    <strong>¿Necesitás ayuda?</strong>
                    <p>Consultanos por nuestros productos y envíos.</p>
                </div>

            </aside>

        </div>

    <?php else: ?>

        <div class="carrito-vacio">
            <h3>Tu carrito está vacío</h3>
            <p>Descubrí nuestros accesorios y encontrá tus favoritos.</p>

            <a href="<?= site_url('productos') ?>" class="seguir">
                Ver productos →
            </a>
        </div>

    <?php endif; ?>

</div>
