<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//home
$routes->get('/', 'ProductController::home');
$routes->get('/home', 'ProductController::home');
$routes->get('/productDetails/(:any)', 'ProductController::productDetails/$1');

//Logs
$routes->get('/login', 'AdminController::login');
$routes->post('/authlog', 'AdminController::authlog');
$routes->get('/register', 'AdminController::register');
$routes->post('/authreg', 'AdminController::authreg');
$routes->get('/logout', 'AdminController::logout');

//admin
$routes->get('/admin', 'SAController::admin', ['filter' => 'authGuard']);
$routes->post('/save', 'SAController::save');
$routes->get('/delete/(:any)', 'SAController::delete/$1');
$routes->get('/edit/(:any)', 'SAController::edit/$1');

