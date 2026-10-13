<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta principal
$routes->get('/', 'Home::index');

// 1. RUTAS DE AUTENTICACIÓN DE USUARIO

// 1.1 Mostrar el formulario de registro
$routes->get('/register', 'Auth::register');

// 1.2 Procesar el formulario de registro
$routes->post('/register', 'Auth::registrar');

// 1.3 Mostrar el formulario de inicio de sesión
$routes->get('/login', 'Auth::login');

// 1.4 Procesar el formulario de inicio de sesión
$routes->post('/login', 'Auth::ingresar');

// 1.5 Cerrar sesión
$routes->get('/logout', 'Auth::logout');