<?php
require('../helpers.php');
require basePath('Database.php');
require basePath('Router.php');

// Instantiate Router Class
$router = new Router();
// Get Routes
$routes = require basePath('routes.php');
// Get Current URI and HTTP Method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
// Route Request
$router->route($uri, $method);

