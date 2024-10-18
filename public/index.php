<?php
require('../helpers.php');
require basePath('Database.php');
require basePath('Router.php');

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

