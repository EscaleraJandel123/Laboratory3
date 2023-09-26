<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'ProductController::home');
$routes->get('/home(:any)', 'ProductController::home/$1');