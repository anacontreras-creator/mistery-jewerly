<?= view('templates/header') ?>

<h2>Mi carrito - Mystery Jewelry</h2>

<?php if (empty($productos)): ?>
    <p>Tu carrito está vacío.</p>
    <a href="<?= site_url('productos') ?>">Volver a productos</a>
<?php else: ?>

    <table border="1" cellpadding="10">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>

        <?php $total = 0; ?>

        <?php foreach ($productos as $producto): ?>
            <?php $subtotal = $producto['precio'] * $producto['cantidad']; ?>
            <?php $total += $subtotal; ?>

            <tr>
                <td><?= esc($producto['nombre']) ?></td>
                <td>$<?= number_format($producto['precio'], 0, ',', '.') ?></td>
                <td><?= esc($producto['cantidad']) ?></td>
                <td>$<?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>$<?= number_format($total, 0, ',', '.') ?></strong></td>
        </tr>
    </table>

    <br>
    <a href="<?= site_url('productos') ?>">Seguir comprando</a>

<?php endif; ?>