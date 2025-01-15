<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'GuestController::index');

$routes->get('/room', 'RoomController::index');
$routes->get('/room/create', 'RoomController::create');
$routes->post('/room/store', 'RoomController::store');
$routes->get('/room/edit/(:num)', 'RoomController::edit/$1');
$routes->post('/room/update/(:num)', 'RoomController::update/$1');
$routes->get('/room/delete/(:num)', 'RoomController::delete/$1');

$routes->get('/event', 'EventController::index'); // Menampilkan semua acara
$routes->get('/event/create', 'EventController::create'); // Menampilkan form tambah acara
$routes->post('/event/store', 'EventController::store'); // Menyimpan acara baru
$routes->get('/event/edit/(:num)', 'EventController::edit/$1'); // Menampilkan form edit acara
$routes->post('/event/update/(:num)', 'EventController::update/$1'); // Menyimpan perubahan acara
$routes->get('/event/delete/(:num)', 'EventController::delete/$1'); // Menghapus acara

$routes->get('/guest', 'GuestController::index'); // Menampilkan daftar tamu
$routes->get('/guest/create', 'GuestController::create'); // Menampilkan form tambah tamu
$routes->post('/guest/store', 'GuestController::store'); // Menyimpan tamu baru
$routes->get('/guest/edit/(:num)', 'GuestController::edit/$1'); // Menampilkan form edit tamu
$routes->post('/guest/update/(:num)', 'GuestController::update/$1'); // Menyimpan perubahan tamu
$routes->get('/guest/delete/(:num)', 'GuestController::delete/$1'); // Menghapus tamu

