<?= view('templates/header') ?>

<style>
    .register-overlay {
        position: fixed;
        inset: 0;
        z-index: 999;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;

        background: rgba(0, 0, 0, 0.30);
    }

    .register-box {
        width: 100%;
        max-width: 460px;
        padding: 38px 40px;

        background: rgba(245, 245, 245, 0.82);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);

        border: 1px solid rgba(255, 255, 255, 0.7);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .register-box h3 {
        text-align: center;
        font-size: 25px;
        letter-spacing: 3px;
        font-weight: 400;
        text-transform: uppercase;
        color: #333;
        margin-bottom: 30px;
    }

    .register-box label {
        font-size: 13px;
        letter-spacing: 1px;
        color: #555;
    }

    .register-box .form-control {
        background: rgba(255, 255, 255, 0.65);
        border: 1px solid #ccc;
        border-radius: 0;
        padding: 11px;
    }

    .register-box .form-control:focus {
        border-color: #888;
        box-shadow: none;
    }

    .register-btn {
        width: 100%;
        padding: 12px;
        margin-top: 10px;
        border: 1px solid #333;
        border-radius: 0;
        background: #333;
        color: white;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 12px;
        transition: 0.3s;
    }

    .register-btn:hover {
        background: transparent;
        color: #333;
    }

    .register-login {
        text-align: center;
        margin-top: 22px;
        font-size: 13px;
        color: #555;
    }

    .register-login a {
        color: #333;
        font-weight: 600;
        text-decoration: underline;
    }

    .register-login a:hover {
        color: #888;
    }

    @media (max-width: 576px) {
        .register-box {
            padding: 30px 24px;
        }
    }
</style>

<div class="register-overlay">

    <div class="register-box">

        <h3>Crear cuenta</h3>

        <?php if (session()->getFlashdata('errores')): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errores') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="name" class="form-label">
                    Nombre completo
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    required
                >
            </div>

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

            <div class="mb-3">
                <label for="password" class="form-label">
                    Contraseña
                </label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    required
                    minlength="8"
                >
            </div>

            <button type="submit" class="register-btn">
                Registrarse
            </button>
        </form>

        <div class="register-login">
            ¿Ya tenés una cuenta?
            <a href="<?= site_url('login') ?>">
                Iniciá sesión aquí
            </a>
        </div>

    </div>

</div>

<?= view('templates/footer') ?>
