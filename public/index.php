<?php
require __DIR__ . '/../vendor/autoload.php';
require('../helpers.php');
use Framework\Router;

// spl_autoload_register(function($class){
//     $path = basePath('Framework/' . $class . '.php');
//     if(file_exists($path)){
//         require $path;
//     }
// });

// Instantiate Router Class
$router = new Router();
// Get Routes
$routes = require basePath('routes.php');
// Get Current URI and HTTP Method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// inspect($uri);
$method = $_SERVER['REQUEST_METHOD'];
// Route Request
$router->route($uri, $method);

