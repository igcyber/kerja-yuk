<?php
require __DIR__ . '/../vendor/autoload.php';
require('../helpers.php');
use Framework\Router;

// Instantiate Router Class
$router = new Router();
// Get Routes
$routes = require basePath('routes.php');
// Get Current URI and HTTP Method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route Request
$router->route($uri);

