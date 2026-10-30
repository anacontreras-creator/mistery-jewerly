<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar producto</title>
</head>
<body>
    <h1>Agregar producto</h1>

    <form action="<?= site_url('productos/guardar') ?>" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br><br>

        <label>Descripción:</label>
        <input type="text" name="descripcion">
        <br><br>

        <label>Stock:</label>
        <input type="number" name="stock" required>
        <br><br>

        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required>
        <br><br>

        <label>ID de categoría:</label>
        <input type="number" name="id_categoria" required>
        <br><br>

        <button type="submit">Guardar producto</button>
    </form>
</body>
</html>

