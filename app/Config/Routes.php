<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/home', 'ProductController::home');
$routes->get('/productDetails/(:any)', 'ProductController::productDetails/$1');

$routes->match(['post', 'get'], '/login', 'ProductController::login');
//$routes->get('/signup', 'UserController::register' , ['filter' => 'AuthGuard']);
$routes->get('/admin', 'AdminController::admin');
