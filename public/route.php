<?php

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes

$router->add('', ['controller' => 'LandingpageController', 'action' => 'listVehicles']);
$router->add('vehicles-details', ['controller' => 'LandingpageController', 'action' => 'edit']);
$router->add('bookings-create', ['controller' => 'LandingpageController', 'action' => 'create']);
$router->add('bookings-store', ['controller' => 'LandingpageController', 'action' => 'store']);
$router->add('get-price', ['controller' => 'LandingpageController', 'action' => 'getPrice']);



$router->add('user-login', ['controller' => 'ClientController', 'action' => 'loginForm']);
$router->add('login-user', ['controller' => 'ClientController', 'action' => 'login']);
$router->add('logouts', ['controller' => 'ClientController', 'action' => 'logout']);
$router->add('profileclient', ['controller' => 'ClientController', 'action' => 'index']);
$router->add('users-store', ['controller' => 'ClientController', 'action' => 'store']);
$router->add('clients-edit', ['controller' => 'ClientController', 'action' => 'edit']);
$router->add('clients-update', ['controller' => 'ClientController', 'action' => 'update']);
$router->add('users-delete', ['controller' => 'ClientController', 'action' => 'delete']);
$router->add('change-password', ['controller' => 'ClientController', 'action' => 'changePassword']);

$router->add('signup-form',['controller' => 'ClientController','action' => 'signupform' ]);
$router->add('client-register',['controller' => 'ClientController','action' => 'register' ]);


$router->add('my-bookings', ['controller' => 'ClientController', 'action' => 'mybookings']);
$router->add('update-password', ['controller' => 'ClientController', 'action' => 'updatepassword']);

$router->add('login-form', ['controller' => 'UserController', 'action' => 'loginForm']);

$router->add('dashboard', ['controller' => 'Home', 'action' => 'showCount']);

$router->add('contacts', ['controller' => 'ContactController', 'action' => 'index']);
$router->add('contact-us', ['controller' => 'ContactController', 'action' => 'create']);
$router->add('contacts-store', ['controller' => 'ContactController', 'action' => 'store']);
$router->add('contacts-edit', ['controller' => 'ContactController', 'action' => 'edit']);
$router->add('contacts-update', ['controller' => 'ContactController', 'action' => 'update']);
$router->add('contacts-delete', ['controller' => 'ContactController', 'action' => 'delete']);


$router->add('bookings', ['controller' => 'BookingController', 'action' => 'index']);
$router->add('bookings-confirm', ['controller' => 'BookingController', 'action' => 'confirmBooking']);
$router->add('bookings-cancel', ['controller' => 'BookingController', 'action' => 'cancelBooking']);

$router->add('bookings-edit', ['controller' => 'BookingController', 'action' => 'edit']);
$router->add('bookings-update', ['controller' => 'BookingController', 'action' => 'update']);
$router->add('bookings-delete', ['controller' => 'BookingController', 'action' => 'delete']);


$router->add('brands', ['controller' => 'BrandController', 'action' => 'index']);
$router->add('brands-create', ['controller' => 'BrandController', 'action' => 'create']);
$router->add('brands-store', ['controller' => 'BrandController', 'action' => 'store']);
$router->add('brands-edit', ['controller' => 'BrandController', 'action' => 'edit']);
$router->add('brands-update', ['controller' => 'BrandController', 'action' => 'update']);
$router->add('brands-delete', ['controller' => 'BrandController', 'action' => 'delete']);


$router->add('vehicles', ['controller' => 'VehicleController', 'action' => 'index']);
$router->add('vehicles-create', ['controller' => 'VehicleController', 'action' => 'create']);
$router->add('vehicles-store', ['controller' => 'VehicleController', 'action' => 'store']);
$router->add('vehicles-edit', ['controller' => 'VehicleController', 'action' => 'edit']);
$router->add('vehicles-update', ['controller' => 'VehicleController', 'action' => 'update']);
$router->add('vehicles-delete', ['controller' => 'VehicleController', 'action' => 'delete']);


$router->add('sliders', ['controller' => 'SliderController', 'action' => 'index']);
$router->add('sliders-create', ['controller' => 'SliderController', 'action' => 'create']);
$router->add('sliders-store', ['controller' => 'SliderController', 'action' => 'store']);
$router->add('sliders-edit', ['controller' => 'SliderController', 'action' => 'edit']);
$router->add('sliders-update', ['controller' => 'SliderController', 'action' => 'update']);


$router->add('login-form', ['controller' => 'UserController', 'action' => 'loginForm']);
$router->add('login', ['controller' => 'UserController', 'action' => 'login']);
$router->add('logout', ['controller' => 'UserController', 'action' => 'logout']);
$router->add('users', ['controller' => 'UserController', 'action' => 'index']);
$router->add('users-create', ['controller' => 'UserController', 'action' => 'create']);
$router->add('users-store', ['controller' => 'UserController', 'action' => 'store']);
$router->add('users-edit', ['controller' => 'UserController', 'action' => 'edit']);
$router->add('users-update', ['controller' => 'UserController', 'action' => 'update']);
$router->add('users-delete', ['controller' => 'UserController', 'action' => 'delete']);
$router->add('change-password', ['controller' => 'UserController', 'action' => 'changePassword']);
$router->add('password-update', ['controller' => 'UserController', 'action' => 'passwordUpdate']);

$router->dispatch($_SERVER['QUERY_STRING']);


?>