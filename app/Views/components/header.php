<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buen día CoffeeStore</title>
    <link rel="icon" href="<?= base_url('assets/img/cafe-icono.png'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-D7OuHmSTYvT9uqiJzjrPhBeWGp5ZKkWd6DsaPWsRhs6d3Bgk+qFwLLf/IVV+rpO/8DmzLyqpOxOgMBW3XNNbfw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('assets/css/nav.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/footer.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/about.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/contact.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/FAQ.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/comercializacion.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/terminos.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/Construccion.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/Catalogo.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/signup.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/forget.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/perfil.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/listadoP.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/agregarProductos.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/editarProducto.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/listadoPerfiles.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/editarUsuarios.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/catalogo_productos.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/carrito.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/compra.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/comprobante.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/listadoventas.css'); ?>">
</head>

<body>
    <div class="nav-container">
        <header>
            <?php 
            $session = session();
            $loggedIn= $session->get('loggedIn');
            $perfilID = $session->get('perfilID');
            ?> 
            <nav class="header-nav">
                <a class="navbar-brand" href="<?=base_url() ?>">
                    <img src="<?= base_url('assets/img/logo2.png'); ?>" alt="logo" width="120">
                </a>
                <div class="menu-icon" onclick="toggleMenu()">
                    <i class="fas fa-bars"></i>
                </div>
                <ul id="menuList">
                    <?php if ($loggedIn == 1) :?>
                    <li><a href="<?=base_url() ?>">Home</a></li>
                        <?php if ($perfilID==1) :?>
                            <li><a href="<?=base_url('/listarP') ?>">Listado de Productos</a></li>
                            <li><a href="<?=base_url('/listadoPerfiles')?>">Listado de Perfiles</a></li>
                            <li type=submit ><a href="<?=base_url('/listadoConsultas') ?>">Listado Consultas</a></li>
                            <li type=submit ><a href="<?=base_url('/listadoVentas') ?>">Listado Ventas</a></li>
                            <li type=submit ><a href="<?=base_url('/Perfil') ?>">Perfil</a></li>
                        <?php else: ?>
                            <li><a href="<?=base_url('/Catalogo') ?>">Productos</a></li>
                            <li><a href="<?=base_url('/about')?>">About</a></li>
                            <li><a href="<?=base_url('/contact')?>">Contact</a></li>
                            <li><a href="<?=base_url('/FAQ')?>">FAQ</a></li>
                            <li><a href="<?=base_url('/comercializacion')?>">Comercializacion</a></li>
                            <li><a href="<?=base_url('/carrito/view') ?>">Carrito</a></li>
                            <li type=submit ><a href="<?=base_url('/Perfil') ?>">Perfil</a></li>
                        <?php endif ?>
                    <?php else: ?>
                    <li><a href="<?=base_url() ?>">Home</a></li>
                    <li><a href="<?=base_url('/Catalogo') ?>">Productos</a></li>
                    <li><a href="<?=base_url('/about')?>">About</a></li>
                    <li><a href="<?=base_url('/contact')?>">Contact</a></li>
                    <li><a href="<?=base_url('/FAQ')?>">FAQ</a></li>
                    <li><a href="<?=base_url('/comercializacion')?>">Comercializacion</a></li>
                    <li><a href="<?=base_url('/Login') ?>">Login</a></li>
                    <li><a href="<?=base_url('/Signup') ?>">Signup</a></li>
                    <?php endif ?>
                </ul>
            </nav>
        </header>
    </div>

    <script>
        function toggleMenu() {
            let menuList = document.getElementById("menuList");
            menuList.classList.toggle("show");
        }
    </script>

  <script src="https://kit.fontawesome.com/e98e713854.js" crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
