
<main class="formulario-contacto">
    <div class="form-container">
        <h2 class= "titulo-contacto">¡Contáctanos!</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                
            </div>
        <?php endif; ?>


        <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <?php if (!empty(session()->getFlashdata('mensaje'))): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url('/enviar-consulta') ?>" method="post">
            <div class="form-contact">
                <label for="name">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
            </div>
            <div class="form-contact">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="mail" name="mail" placeholder="example@example.com" required>
            </div>
            <div class="form-contact">
                <label for="message">Mensaje:</label>
                <textarea id="message" name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí" required></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
</main>
