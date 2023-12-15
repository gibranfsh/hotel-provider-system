<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/booking', 'Booking::index');
$routes->get('/explore', 'Explore::index');
$routes->get('/hotel', 'Hotel::index');
$routes->get('/payment', 'Payment::index');
$routes->get('/login', 'Login::index');
