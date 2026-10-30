
<?= view('templates/header') ?>

<h2>Editar producto</h2>

<?php if (session()->getFlashdata('errores')): ?>
    <ul>
        <?php foreach (session()->getFlashdata('errores') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="<?= site_url(
    'productos/actualizar/' . $producto['id_productos']
) ?>" method="post">

    <?= csrf_field() ?>

    <label>Nombre:</label>
    <input type="text" name="nombre"
           value="<?= esc(old('nombre', $producto['nombre'])) ?>" required>

    <br><br>

    <label>Descripción:</label>
    <textarea name="descripcion" required><?= esc(
        old('descripcion', $producto['descripcion'])
    ) ?></textarea>

    <br><br>

    <label>Stock:</label>
    <input type="number" name="stock"
           value="<?= esc(old('stock', $producto['stock'])) ?>"
           min="0" required>

    <br><br>

    <label>Precio:</label>
    <input type="number" name="precio"
           value="<?= esc(old('precio', $producto['precio'])) ?>"
           min="0" step="0.01" required>

    <br><br>

    <label>ID de categoría:</label>
    <input type="number" name="id_categoria"
           value="<?= esc(old('id_categoria', $producto['id_categoria'])) ?>"
           min="1" required>

    <br><br>

    <button type="submit">Guardar cambios</button>

    <a href="<?= site_url('productos') ?>">Cancelar</a>
</form>
