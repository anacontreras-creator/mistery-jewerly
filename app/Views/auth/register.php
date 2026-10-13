```php
<?= view('templates/header') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h3>Registro de Usuario</h3>

            <?php if (session()->getFlashdata('errores')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errores') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- 1. Formulario de registro -->
            <form action="<?= site_url('register') ?>" method="post">
                <?= csrf_field() ?>

                <!-- 1.1 Campo para ingresar el nombre completo -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">
                        Nombre completo
                    </label>
                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        class="form-control"
                        required
                    >
                </div>

                <!-- 1.2 Campo para ingresar el email -->
                <div class="mb-3">
                    <label for="email" class="form-label">
                        Correo electrónico
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        required
                    >
                </div>

                <!-- 1.3 Campo para ingresar la contraseña -->
                <div class="mb-3">
                    <label for="contrasena" class="form-label">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        name="contrasena"
                        id="contrasena"
                        class="form-control"
                        required
                        minlength="8"
                    >
                </div>

                <!-- 1.4 Botón para enviar el formulario -->
                <button type="submit" class="btn btn-primary">
                    Registrarse
                </button>
            </form>

            <!-- 2. Enlace para iniciar sesión -->
            <div class="mt-3">
                ¿Ya tenés una cuenta?
                <a href="<?= site_url('login') ?>">
                    Iniciá sesión aquí
                </a>
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>