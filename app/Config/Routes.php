<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::principal');
$routes->get('/about', 'Home::about');
$routes->get('/FAQ', 'Home::FAQ');
$routes->get('/comercializacion', 'Home::comercializacion' );
$routes->get('/terminos',"Home::terminos");
$routes->get('/priv',"Home::priv");
$routes->get('/Catalogo',"Home::Catalogo");

//CARRITO

$routes->post('carrito/add', 'Cart::add');
$routes->get('carrito/view', 'Cart::view',['filter' => 'authUser']);
$routes->post('carrito/update', 'Cart::update');
$routes->post('carrito/remove/(:any)', 'Cart::remove/$1'); //elimina un item
$routes->post('carrito/remove', 'Cart::remove'); //vacia el carrito



//COMPRA

$routes->post('compra/confirmar', 'Cart::continuar',['filter' => 'authUser']);
$routes->post('compra/finalizar', 'Cart::comprar',['filter' => 'authUser']);
$routes->get('compra/comprobante/(:num)', 'Cart::comprobante/$1',['filter' => 'authUser']);

//Consultas
$routes->post('/enviar-consulta', "Consultas::guardar_consulta");
$routes->get('/contact', 'Consultas::index');
$routes->get('/listadoConsultas', 'Consultas::listar_consultas',['filter' => 'authAdmin']);
$routes->get('/eliminarConsulta/(:num)', 'Consultas::eliminarConsulta/$1',['filter' => 'authAdmin'] );

//LISTADO DE PRODUCTOS PARA LOS CLIENTES
$routes->get('/listado_productos/(:num)',"gestion_catalogo::listado_productos/$1");

//LOGIN
$routes->get('/Construccion',"Home::Construccion");
$routes->get('/Login',"LoginController::index");
$routes->get('/Signup',"Home::signup");

//PERFIL
$routes->get('/Perfil',"Logica::perfil_index",['filter' => 'authUser']);
$routes->get('/listadoVentasU/(:num)', 'Orders::ventasUser/$1',['filter' => 'authUser'] );

/*Rutas para el inicio de sesion*/


$routes->get('/login', 'LoginController::index');
$routes->post('/auth', 'LoginController::auth');
$routes->post('/logout', 'LoginController::logout');
    

/*rutas del registro de usuario*/

$routes->get('/registro','RegistroController::create');
$routes->post('/enviar-form','RegistroController::formValidation');

//Gestion Admin
$routes->get('/listarP', 'Logica::listadoP_index',['filter' => 'authAdmin']);
$routes->get('/listadoPerfiles', 'Logica::listadoPerfiles_index',['filter' => 'authAdmin'] );
$routes->get('/listadoVentas', 'Orders::index',['filter' => 'authAdmin'] );
$routes->get('/listadoEnvios', 'Envios::index',['filter' => 'authAdmin'] );



// agregar productos
$routes->get('/agregarProducto', 'Logica::agregar_producto',['filter' => 'authAdmin']);
$routes->post('/guardarProducto', 'Logica::guardarProducto',['filter' => 'authAdmin']);
$routes->get('/bajaProducto/(:num)', 'Logica::bajaproducto/$1',['filter' => 'authAdmin']);
$routes->get('/altaProducto/(:num)', 'Logica::altaproducto/$1',['filter' => 'authAdmin']);
//editar productos
$routes->get('/editarProducto/(:num)', 'Logica::editarProducto/$1',['filter' => 'authAdmin']); // Ruta para mostrar el formulario de edición
$routes->post('/updateProducto', 'Logica::update',['filter' => 'authAdmin']);
//eliminar
$routes->get('/eliminarProducto/(:num)', 'Logica::eliminarProducto/$1',['filter' => 'authAdmin']);



//GESTOR DE PERFILES

//Editar

$routes->get('/editarUsuario/(:num)', 'Logica::editarUsuario/$1]',['filter' => 'authUser']); // Ruta para mostrar el formulario de edición
$routes->post('/updateUsuario', 'Logica::updateUsuario');

//eliminar
$routes->get('/eliminarUsuario/(:num)', 'Logica::eliminarUsuario/$1',['filter' => 'authAdmin']);
$routes->get('/bajaUsuario/(:num)', 'Logica::bajaUsuario/$1',['filter' => 'authAdmin']);
$routes->get('/altaUsuario/(:num)', 'Logica::altaUsuario/$1',['filter' => 'authAdmin']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
$routes->get('/listar', 'Product::index');