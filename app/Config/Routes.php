<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->post('/login/authenticate', 'Login::authenticate');
$routes->get('/logout', 'Login::logout');


/// cabang
$routes->get('/cabang', 'cabang::index');
$routes->get('/cabang/create', 'cabang::create');
$routes->get('/cabang/edit/(:num)', 'cabang::edit/$1');
$routes->post('/cabang/process', 'cabang::process');
$routes->post('/cabang/edit/process', 'cabang::edit_process');
$routes->get('/cabang/delete/(:num)', 'cabang::delete/$1');


/// karyawan
$routes->get('/karyawan', 'karyawan::index');
$routes->get('/karyawan/create', 'karyawan::create');
$routes->get('/karyawan/edit/(:num)', 'karyawan::edit/$1');
$routes->post('/karyawan/process', 'karyawan::process');
$routes->post('/karyawan/edit/process', 'karyawan::edit_process');
$routes->get('/karyawan/delete/(:num)', 'karyawan::delete/$1');

/// user
$routes->get('/user', 'user::index');
$routes->get('/user/create', 'user::create');
$routes->get('/user/edit/(:num)', 'user::edit/$1');
$routes->post('/user/process', 'user::process');
$routes->get('/user/edit/process/(:num)', 'user::edit_process/$1');
$routes->get('/user/delete/(:num)', 'user::delete/$1');


//produksi
$routes->get('/produksi', 'produksi::index');
$routes->get('/produksi/create', 'produksi::create');
$routes->post('/produksi/process', 'produksi::process');
