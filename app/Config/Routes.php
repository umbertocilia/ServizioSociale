<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);
// Admin routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "AdminController::index");
});
// Editor routes
$routes->group("editor", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "EditorController::index");
});
$routes->get('logout', 'UserController::logout');
