<div class='fondo-gestores'>
    <div class="coffee-usuario-edit-container">
    <?php 
        $session = session();
        $loggedIn = $session->get('loggedIn');
        $perfilID = $session->get('perfilID');
    ?> 
    <?php if ($loggedIn == 1) : ?>
        <h2 class="coffee-usuario-edit-title">Editar Perfil</h2>
        <form class="coffee-usuario-edit-form" action="<?= base_url('/updateUsuario') ?>" method="post">
            <input type="hidden" name="userID" value="<?= esc($user['userID']); ?>"> <!-- Aquí va el ID del producto a editar -->
            
            <div class="coffee-user-form-group">
                <label for="coffee-user-nombre-label">Nombre:</label>
                <input type="text" name="nombre" id="coffee-product-nombre-label" value="<?= esc($user['nombre']); ?>" required>
            </div>
            
            <div class="coffee-user-form-group">
                <label for="coffee-user-apellido-label">Apellido:</label>
                <textarea name="apellido" id="coffee-user-apellido-label" rows="1" required><?= esc($user['apellido']); ?></textarea>
            </div>
            
            <div class="coffee-user-form-group">
                <label for="coffee-user-mail-label">Mail:</label>
                <input type="text" name="mail" id="coffee-user-mail-label" value="<?= esc($user['mail']); ?>" required>
            </div>
            
            <div class="coffee-user-form-group">
                <label for="coffee-user-usuario-label">Usuario: </label>
                <input type="text" name="usuario" id="coffee-usuario-perfilID-label" value="<?= esc($user['usuario']); ?>" required>
            </div>
            <?php if ($perfilID == 1) : ?>
                <div class="coffee-user-form-group">
                    <label for="coffee-user-perfilID-label">PerfilID:</label>
                    <select name="perfilID" id="coffee-user-perfilID-label" required>
                        <option value="1" <?= $user['perfilID'] == 1 ? 'selected' : ''; ?>>Admin</option>
                        <option value="2" <?= $user['perfilID'] == 2 ? 'selected' : ''; ?>>Usuario</option>
                    </select>
                </div>
                
                <div class="coffee-user-form-group">
                    <label for="coffee-user-baja-label">Baja:</label>
                    <select name="baja" id="coffee-user-baja-label" required>
                        <option value="1" <?= $user['baja'] == 1 ? 'selected' : ''; ?>>De Baja</option>
                        <option value="0" <?= $user['baja'] == 0 ? 'selected' : ''; ?>>De Alta</option>
                    </select>
                </div>
                <div class="coffee-user-form-group">
                <label for="coffee-user-password-label">Nueva Contraseña: </label>
                <input type="password" name="password" id="coffee-usuario-password-label" placeholder="Dejar en blanco para no cambiar">
            </div>
            <?php endif; ?>
            
            
            <button type="submit" class="coffee-submit-button">Guardar Cambios</button>
        </form>
    <?php else : ?>
        <h1>No puedes editar nada sin logearte</h1>
    <?php endif; ?>
    </div>
</div>
