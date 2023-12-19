<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/booking/(:num)', 'Booking::initBooking/$1');
$routes->post('/booking/create', 'Booking::create');
$routes->get('/bookings', 'Booking::index');
$routes->get('/explore', 'Explore::index');
$routes->get('/hotel', 'Hotel::index');
$routes->get('/payment', 'Payment::index');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::loginAction');
$routes->get('/logout', 'Login::logout');

// Grouping API routes for hoteloka
$routes->group('api', function ($routes) {
    $routes->post('login', 'Login::loginActionProvider');
    $routes->put('booking/(:num)', 'Booking::updateProvider/$1');
    $routes->delete('booking/(:num)', 'Booking::deleteProvider/$1');
});
