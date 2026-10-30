
<?= view('templates/header') ?>

<h2>Agregar producto</h2>

<?php if (session()->getFlashdata('errores')): ?>
    <ul>
        <?php foreach (session()->getFlashdata('errores') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="<?= site_url('productos/guardar') ?>" method="post">
    <?= csrf_field() ?>

    <label>Nombre:</label>
    <input type="text" name="nombre"
           value="<?= old('nombre') ?>" required>

    <br><br>

    <label>Descripción:</label>
    <textarea name="descripcion" required><?= old('descripcion') ?></textarea>

    <br><br>

    <label>Stock:</label>
    <input type="number" name="stock"
           value="<?= old('stock') ?>" min="0" required>

    <br><br>

    <label>Precio:</label>
    <input type="number" name="precio"
           value="<?= old('precio') ?>" min="0" step="0.01" required>

    <br><br>

    <label>ID de categoría:</label>
    <input type="number" name="id_categoria"
           value="<?= old('id_categoria') ?>" min="1" required>

    <br><br>

    <button type="submit">Guardar producto</button>

    <a href="<?= site_url('productos') ?>">Cancelar</a>
</form>
