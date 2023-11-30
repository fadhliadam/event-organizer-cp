<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class,'index'])->setDefaultNamespace('home');
$routes->get('/login', 'Login::index');
$routes->get('/login/process', 'Login::process');
