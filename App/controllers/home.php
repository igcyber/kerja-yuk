<?php
use Framework\Database;

$config = require basePath('config/db.php');
$db = new Database($config);
$listings = $db->requestQuery('SELECT * FROM listings')->fetchAll();
// inspect($listings);
loadView('home', [
    'listings' => $listings
]);