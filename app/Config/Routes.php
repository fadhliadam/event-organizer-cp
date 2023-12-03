<?php

use App\Controllers\AdminController;
use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\Superadmin\SuperadminDashboardController;
use App\Controllers\Superadmin\SuperadminLoginController;
use App\Controllers\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', [Home::class,'index'])->setDefaultNamespace('home');
$routes->get('/admin/dashboard', [AdminController::class,'index'])->setDefaultNamespace('dashboard');
$routes->get('/admin/dashboard/collaborator', [AdminController::class,'collaborator'])->setDefaultNamespace('collaborator');
$routes->get('/', [Home::class, 'index']);

$routes->get('/login', [Login::class, 'index']);
$routes->get('/login/process', [Login::class, 'process']);

$routes->group('/superadmin', function($routes) {
    $routes->get('login', [SuperadminLoginController::class, 'index']);
    $routes->post('login', [SuperAdminLoginController::class, 'loginAuth']);
    $routes->get('logout', [SuperAdminLoginController::class, 'logout']);

    $routes->get('dashboard', [SuperadminDashboardController::class, 'index'], ['filter' => 'auth']);
    $routes->get('users', [UserController::class, 'index'], ['filter' => 'auth']);
    $routes->get('users/delete/(:num)', [UserController::class, 'destroy'], ['filter' => 'auth']);
});
