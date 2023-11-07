<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Registro::index');
$routes->get('logout', 'Registro::logout');

// Rutas de logueo
$routes->group('login', function($routes){
    $routes->post('/', 'Log\Login::login', ['as' => 'login.login']);
    $routes->get('out', 'Log\Login::logout', ['as' => 'login.logout']);
    $routes->get('show', 'Log\Login::show', ['as' => 'login.show']);
    $routes->post('checkAuthMod', 'Log\Sessions::moduleGrant', ['as' => 'sessions.moduleGrant']);
});

// Rutas protegidas por BearerToken
$routes->group('auth', ['filter' => 'bearerToken'], function($routes){
    $routes->get('check', 'Log\Login::tokenCheck', ['as' => 'auth.check']);
    $routes->get('test', 'Test::index', ['as' => 'test.index']);
    // $routes->get('show', 'Log\Login::show', ['as' => 'auth.show', 'filter' => 'hasRole:sessions_show_all']);
    $routes->get('show', 'Log\Login::show', ['as' => 'auth.show', 'filter' => 'hasRole:sessions_show_all']);


    // Inventarios
    $routes->group('inventario', function($routes){
        $routes->post('quoteDetail', 'Products\Inventario::quoteDetail', ['as' => 'quote.detail', 'filter' => 'hasRole:quotes_detailed']);
    });
});

// Rutas test
$routes->group('test', function($routes){
    $routes->get('showUsers', 'Log\Sessions::showUsers', ['as' => 'sessions.showUsers', 'filter' => 'hasRole:sessions_show_all']);
    $routes->get('testClients', 'Products\Test::index');
});

// $routes->group('dashboard', ['filter' => 'DashboardFilter'], function($routes){
//     $routes->get('usuario/crear', '\App\Controllers\Web\Usuario::create_user', ['as' => 'usuario.create_user']);
//     $routes->get('usuario/test_password/(:num)', '\App\Controllers\Web\Usuario::test_password/$1', ['as' => 'usuario.test_pw']);
//     $routes->get('peliculas', 'Pelicula::index', ['as' => 'pelicula.index']);
// });
