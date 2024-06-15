<?=$header?>
<div class="signup-container">
<form class="signup-form" method="post" action="<?= base_url('/enviar-form') ?>"> 
        <h2>Crear una cuenta</h2>
        <?php $validation = \Config\Services::validation(); ?>
     <?php if(!empty (session()->getFlashdata('fail'))):?>
     <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
        <?php endif?>
           <?php if(!empty (session()->getFlashdata('success'))):?>
         <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
          <?php endif?> 

        <div class="form-signup">
            <label for="nombre"><i class="fas fa-user"></i> Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
            <?php if($validation->getError('nombre')) {?>
            <div class='error-form'>
              <?= $error = $validation->getError('nombre'); ?>
            </div>
        <?php }?>
        </div>
        <div class="form-signup">
            <label for="apellido"><i class="fas fa-user"></i> Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
            <?php if($validation->getError('apellido')) {?>
            <div class='error-form'>
              <?= $error = $validation->getError('apellido'); ?>
            </div>
        <?php }?>
        </div>
        <div class="form-signup">
            <label for="usuario"><i class="fa-solid fa-user-tie"></i> Username:</label>
            <input type="text" id="usuario" name="usuario" placeholder="Ingresa tu Username" required>
            <?php if($validation->getError('usuario')) {?>
            <div class='error-form'>
              <?= $error = $validation->getError('usuario'); ?>
            </div>
        <?php }?>
        </div>
        <div class="form-signup">
            <label for="mail"><i class="fas fa-envelope"></i> Correo electrónico:</label>
            <input type="mail" id="mail" name="mail" placeholder="Ingresa tu correo electrónico" required>
            <?php if($validation->getError('mail')) {?>
            <div class='error-form'>
              <?= $error = $validation->getError('mail'); ?>
            </div>
        <?php }?>
        </div>
        <div class="form-signup">
            <label for="password"><i class="fas fa-lock"></i> Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            <?php if($validation->getError('password')) {?>
            <div class='error-form'>
              <?= $error = $validation->getError('password'); ?>
            </div>
        <?php }?>
        </div>
        <button type="submit" class="signup-btn">Registrarse</button>
        <p class="login-link">¿Ya tienes una cuenta?<a href="<?=base_url('/Login') ?>">Iniciar sesión</a></p>
        </form>
        
    
</div>

<?=$footer?>