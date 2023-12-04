<?php

use App\Controllers\Admin\AdminDashboardController;
use App\Controllers\Admin\AdminEventController;
use App\Controllers\Admin\AdminLoginController;
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
$routes->get('/', [Home::class, 'index']);

$routes->get('/login', [Login::class, 'index']);
$routes->get('/login/process', [Login::class, 'process']);

$routes->group('/admin', function ($routes) {
    $routes->get('login', [AdminLoginController::class, 'index']);
    $routes->post('login', [AdminLoginController::class, 'loginAuth']);
    $routes->get('logout', [AdminLoginController::class, 'logout']);
    $routes->get('dashboard', [AdminDashboardController::class, 'index'], ['filter' => 'auth']);
    $routes->get('events', [AdminEventController::class, 'index'], ['filter' => 'auth']);
    $routes->get('collaborators', [AdminDashboardController::class, 'collaborator'], ['filter' => 'auth']);
});
$routes->group('/superadmin', function ($routes) {
    $routes->get('login', [SuperadminLoginController::class, 'index']);
    $routes->post('login', [SuperAdminLoginController::class, 'loginAuth']);
    $routes->get('logout', [SuperAdminLoginController::class, 'logout']);

    $routes->get('dashboard', [SuperadminDashboardController::class, 'index'], ['filter' => 'auth']);
    $routes->get('users', [UserController::class, 'index'], ['filter' => 'auth']);
    $routes->get('users/delete/(:num)', [UserController::class, 'destroy'], ['filter' => 'auth']);
});
