<?php

use App\Controllers\AdminController;
use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', [Home::class,'index'])->setDefaultNamespace('home');
$routes->get('/admin/dashboard', [AdminController::class,'index'])->setDefaultNamespace('dashboard');
$routes->get('/admin/dashboard/collaborator', [AdminController::class,'collaborator'])->setDefaultNamespace('collaborator');
