<?php
use Framework\Database;
$config = require basePath('config/db.php');
$db = new Database($config);

$listings = $db->requestQuery('SELECT * FROM listings LIMIT 6')->fetchAll();

loadView('listings/index', [
    'listings' => $listings
]);