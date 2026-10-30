<?= view('templates/header') ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h3>Iniciar Sesión</h3>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('exito')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('exito') ?>
                </div>
            <?php endif; ?>

            <!-- 1. Formulario de inicio de sesión -->
            <form action="<?= site_url('login') ?>" method="post">
                <?= csrf_field() ?>

                <!-- 1.1 Campo para el email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        required
                    >
                </div>

                <!-- 1.2 Campo para la contraseña -->
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        required
                    >
                </div>

                <!-- 1.3 Botón para enviar el formulario -->
                <button type="submit" class="btn btn-primary">
                    Iniciar sesión
                </button>
            </form>

            <!-- 2. Enlace al registro -->
            <div class="mt-3">
                ¿No tenés una cuenta?
                <a href="<?= site_url('register') ?>">Registrate aquí</a>
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>