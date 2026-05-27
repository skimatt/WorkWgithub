<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', static function () {
    return redirect()->to('/login');
});

$routes->get('/login', 'Auth::login', ['filter' => 'guest']);
$routes->post('/login', 'Auth::attempt', ['filter' => 'guest']);
$routes->get('/logout', 'Auth::logout', ['filter' => 'auth']);

$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index', ['filter' => 'role:admin']);
});

$routes->group('peserta', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Peserta\Dashboard::index', ['filter' => 'role:peserta']);
});
