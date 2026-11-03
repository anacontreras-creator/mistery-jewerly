<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal
$routes->get('/', function () {
    return view('Auth/home');
});

// 1. RUTAS DE AUTENTICACIÓN DE USUARIO

// 1.1 Mostrar el formulario de registro
$routes->get('/register', 'Auth::register');
// 1.2 Procesar el formulario de registro
$routes->post('/register', 'Auth::processRegister');
// 1.3 Mostrar el formulario de inicio de sesión
$routes->get('/login', 'Auth::login');
// 1.4 Procesar el formulario de inicio de sesión
$routes->post('/login', 'Auth::processLogin');
// 1.5 Cerrar sesión
$routes->get('/logout', 'Auth::logout');

$routes->get('productos/editar/(:num)', 'Productos::editar/$1');
$routes->post('productos/actualizar/(:num)', 'Productos::actualizar/$1');
$routes->post('productos/eliminar/(:num)', 'Productos::eliminar/$1');
$routes->get('prueba-bd', 'PruebaBD::index');
$routes->get('productos', 'Productos::index');
$routes->get('productos/crear', 'Productos::crear');
$routes->post('productos/guardar', 'Productos::guardar');
$routes->post(
    'carrito/agregar/(:num)',
    'Productos::agregarAlCarrito/$1'
);
$routes->get('carrito', 'Productos::verCarrito');
$routes->post('carrito/aumentar/(:num)', 'Productos::aumentarCantidad/$1');

$routes->post('carrito/disminuir/(:num)', 'Productos::disminuirCantidad/$1');
