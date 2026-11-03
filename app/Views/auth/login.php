<?= view('templates/header') ?>

<style>
    body {
        margin: 0;
    }

    .login-overlay {
        position: fixed;
        inset: 0;
        z-index: 999;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;

        background: rgba(0, 0, 0, 0.30);
    }

    .login-box {
        width: 100%;
        max-width: 440px;
        padding: 45px 40px;

        background: rgba(245, 245, 245, 0.82);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);

        border: 1px solid rgba(255, 255, 255, 0.7);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .login-box h3 {
        text-align: center;
        font-size: 25px;
        letter-spacing: 3px;
        font-weight: 400;
        text-transform: uppercase;
        color: #333;
        margin-bottom: 35px;
    }

    .login-box label {
        font-size: 13px;
        letter-spacing: 1px;
        color: #555;
    }

    .login-box .form-control {
        background: rgba(255, 255, 255, 0.65);
        border: 1px solid #ccc;
        border-radius: 0;
        padding: 12px;
    }

    .login-box .form-control:focus {
        border-color: #888;
        box-shadow: none;
    }

    .login-btn {
        width: 100%;
        padding: 12px;
        margin-top: 12px;
        border: 1px solid #333;
        border-radius: 0;
        background: #333;
        color: white;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-size: 12px;
        transition: 0.3s;
    }

    .login-btn:hover {
        background: transparent;
        color: #333;
    }

    .login-register {
        text-align: center;
        margin-top: 25px;
        font-size: 13px;
        color: #555;
    }

    .login-register a {
        color: #333;
        font-weight: 600;
        text-decoration: underline;
    }

    .login-register a:hover {
        color: #888;
    }

    @media (max-width: 576px) {
        .login-box {
            padding: 35px 25px;
        }
    }
</style>

<div class="login-overlay">

    <div class="login-box">

        <h3>Iniciar sesión</h3>

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

        <form action="<?= site_url('login') ?>" method="post">
            <?= csrf_field() ?>

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
                >
            </div>

            <button type="submit" class="login-btn">
                Iniciar sesión
            </button>
        </form>

        <div class="login-register">
            ¿No tenés una cuenta?
            <a href="<?= site_url('register') ?>">Registrate aquí</a>
        </div>

    </div>

</div>

<?= view('templates/footer') ?>
