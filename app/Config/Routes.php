<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "User::login_get");
$routes->post("/", "User::login_post");

$routes->get("/register", "User::register_get");
$routes->post("/register", "User::register_post");

$routes->get("/logout", "User::logout");

$routes->get("/dashboard", "Dashboard::dashboard_get", ["filter" => "isLoggedIn"]);

$routes->get("/dashboard/edit/(:num)", "Dashboard::dashboard_edit_get/$1", ["filter" => "isLoggedIn"]);
$routes->post("/dashboard/edit/(:num)", "Dashboard::dashboard_edit_patch/$1", ["filter" => "isLoggedIn"]);
$routes->get("/dashboard/delete/(:num)", "Dashboard::dashboard_delete/$1", ["filter" => "isLoggedIn"]);

$routes->get("/profile/(:num)", "dashboard::dashboard_profile/$1", ["filter" => "isLoggedIn"]);

// fetch
$routes->post("/export-data", "fetch::export");
$routes->get("/provinsi", "Fetch::userProvinsi_get");