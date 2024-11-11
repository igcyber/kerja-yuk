<?php

namespace App\Controllers;
use Framework\Database;

class HomeController{

    private $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config); 
    }

    public function index()
    {
        $listings = $this->db->requestQuery('SELECT * FROM listings')->fetchAll();

        loadView('home', [
            'listings' => $listings
        ]);
    }
}

