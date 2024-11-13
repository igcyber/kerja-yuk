<?php

namespace App\Controllers;
use Framework\Database;
use Framework\Validation;

class ListingController {

    private $db;

    public function __construct()
    {
        $config = require basePath('config/db.php');
        $this->db = new Database($config);
    }

    public function index()
    {
        $listings = $this->db->requestQuery('SELECT * FROM listings')->fetchAll();

        loadView('listings/index', [
            'listings' => $listings
        ]); 
    }

    public function create()
    {
        echo 'Listings Create';
    }

    public function show($params)
    {
        $id = $params['id'] ?? '';

        $params = [
            'id' => $id
        ];
        
        $listing = $this->db->requestQuery('SELECT * FROM listings WHERE id = :id', $params)->fetch();

        if(!$listing){
            ErrorController::notFound('Data Is Not Found');
            return;
        }
        
        loadView('listings/show', [
            'listing' => $listing,
        ]);
    }
}