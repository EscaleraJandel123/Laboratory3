<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'ProductController::home');
$routes->get('/home', 'ProductController::home');
$routes->get('/productDetails/(:any)', 'ProductController::productDetails/$1');

$routes->get('/admin', 'ProductController::admin', ['filter' => 'authGuard']);

$routes->get('/login', 'AdminController::login');
$routes->post('/authlog', 'AdminController::authlog');
$routes->get('/register', 'AdminController::register');
$routes->post('/authreg', 'AdminController::authreg');

