<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('acerca_de', 'Home::acerca_de');
$routes->get('agregar_productos', 'Home::agregar_productos');
$routes->get('consulta_productos', 'Consulta_controller::index'); // Ruta para consultar productos
$routes->get('registro', 'Home::registro');
$routes->get('login', 'Home::login');

/* Rutas del registro de usuarios */
$routes->get('/registro', 'usuario_controller::create');
$routes->post('/enviar-form', 'usuario_controller::formValidation');

/* Rutas del login */
$routes->get('/login', 'login_controller');
$routes->post('/enviarlogin', 'login_controller::auth');
$routes->get('/panel', 'Panel_controller::index', ["filter" => 'auth']);
$routes->get('/logout', 'login_controller::logout');

/* Rutas del producto */
$routes->get('/agregar_productos', 'producto_controller::create');
$routes->post('/enviar-producto', 'producto_controller::formValidation');

/* Rutas de consulta del producto */
$routes->get('/consulta_productos', 'Consulta_controller::create');
$routes->post('/enviar-consulta', 'Consulta_controller::enviar_consulta');


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
