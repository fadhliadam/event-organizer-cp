<?php

use App\Controllers\Admin\AdminCollaboratorController;
use App\Controllers\Admin\AdminDashboardController;
use App\Controllers\Admin\AdminEventController;
use App\Controllers\Admin\AdminLoginController;
use App\Controllers\Home;
use App\Controllers\User\Login;
use App\Controllers\User\UserDashboardController;
use App\Controllers\Superadmin\SuperadminDashboardController;
use App\Controllers\Superadmin\SuperadminLoginController;
use App\Controllers\Superadmin\SuperadminUserController;
use App\Controllers\Superadmmin\SuperadminEventController;
use App\Controllers\User\UserEventController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->set404Override(function () {
    $data['title'] = 'Not Found';
    return view('pages/notfound/index', $data);
});

$routes->get('/', [Home::class, 'index']);

$routes->get('/login', [Login::class, 'index']);
$routes->delete('/logout', [Login::class, 'logout']);
$routes->get('/login/process', [Login::class, 'process']);
$routes->get('/dashboard', [UserDashboardController::class, 'index'], ['filter' => 'auth']);
$routes->get('/events/(:num)', [UserEventController::class, 'detail'], ['filter' => 'auth']);

$routes->group('/admin', function ($routes) {
    $routes->get('login', [AdminLoginController::class, 'index']);
    $routes->post('login', [AdminLoginController::class, 'loginAuth']);
    $routes->get('logout', [AdminLoginController::class, 'logout']);
    $routes->get('dashboard', [AdminDashboardController::class, 'index'], ['filter' => 'auth']);

    $routes->group('events', ['filter' => 'auth'], function ($routes) {
        $routes->get('/', [AdminEventController::class, 'index']);
        $routes->get('new', [AdminEventController::class, 'new']);
        $routes->post('new', [AdminEventController::class, 'store']);
        $routes->get('edit/(:num)', [AdminEventController::class, 'edit']);
        $routes->put('edit/(:num)', [AdminEventController::class, 'update']);
        $routes->delete('delete/(:num)', [AdminEventController::class, 'destroy']);
    });
    $routes->group('collaborators', ['filter' => 'auth'], function ($routes) {
        $routes->get('/', [AdminCollaboratorController::class, 'index']);
        // $routes->get('edit/(:num)', [AdminCollaboratorController::class, 'edit']);
        // $routes->put('edit/(:num)', [AdminCollaboratorController::class, 'update']);
        // $routes->get('delete/(:num)', [AdminCollaboratorController::class, 'destroy']);
    });
});

$routes->group('/superadmin', function ($routes) {
    $routes->get('login', [SuperadminLoginController::class, 'index']);
    $routes->post('login', [SuperAdminLoginController::class, 'loginAuth']);
    $routes->delete('logout', [SuperAdminLoginController::class, 'logout']);

    $routes->get('dashboard', [SuperadminDashboardController::class, 'index'], ['filter' => 'auth']);

    $routes->group('users', ['filter' => 'auth'], function ($routes) {
        $routes->get('/', [SuperadminUserController::class, 'index']);
        $routes->get('new', [SuperadminUserController::class, 'new']);
        $routes->post('new', [SuperadminUserController::class, 'store']);
        $routes->get('edit/(:num)', [SuperadminUserController::class, 'edit']);
        $routes->put('edit/(:num)', [SuperadminUserController::class, 'update']);
        $routes->delete('delete/(:num)', [SuperadminUserController::class, 'destroy']);
    });

    $routes->group('events', ['filter' => 'auth'], function ($routes) {
        $routes->get('/', [SuperadminEventController::class, 'index']);
        $routes->get('new', [SuperadminEventController::class, 'new']);
        $routes->post('new', [SuperadminEventController::class, 'store']);
        $routes->get('edit/(:num)', [SuperadminEventController::class, 'edit']);
        $routes->put('edit/(:num)', [SuperadminEventController::class, 'update']);
        $routes->delete('delete/(:num)', [SuperadminEventController::class, 'destroy']);
    });
});
