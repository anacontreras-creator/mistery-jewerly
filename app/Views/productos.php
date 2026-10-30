
<?= view('templates/header') ?>

<h2>Productos - Mystery Jewelry</h2>

<?php if (session()->getFlashdata('mensaje')): ?>
    <p>
        <?= esc(session()->getFlashdata('mensaje')) ?>
    </p>
<?php endif; ?>

<a href="<?= site_url('productos/crear') ?>">
    Agregar producto
</a>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= esc($producto['id_productos']) ?></td>
                <td><?= esc($producto['nombre']) ?></td>
                <td><?= esc($producto['descripcion']) ?></td>
                <td><?= esc($producto['stock']) ?></td>
                <td><?= esc($producto['precio']) ?></td>
                <td><?= esc($producto['id_categoria']) ?></td>

                <td>
                    <a href="<?= site_url(
                        'productos/editar/' . $producto['id_productos']
                    ) ?>">
                        Editar
                    </a>

                    <form
                        action="<?= site_url(
                            'productos/eliminar/' . $producto['id_productos']
                        ) ?>"
                        method="post"
                        style="display:inline"
                        onsubmit="return confirm('¿Eliminar este producto?')"
                    >
                        <?= csrf_field() ?>

                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
