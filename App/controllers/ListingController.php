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
        loadView('listings/create'); 
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


    public function store()
    {
        $allowedFields = ['job_title', 'salary', 'description',
        'requirements', 'benefits', 'job_type', 'tags', 'company', 'address', 'city', 'province', 'phone','email'];

        $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
        
        $newListingData['user_id'] = 1;

        $newListingData = array_map('sanitize', $newListingData);

        $requiredFields = ['job_title', 'requirements', 'description', 'job_type', 'email', 'city', 'province'];

        $errors = [];

        foreach($requiredFields as $field)
        {
            // inspect($newListingData[$field]);
            if(empty($newListingData[$field]) || !Validation::string($newListingData[$field])){
                $errors[$field] = ucfirst($field) . ' tidak boleh kosong';
            }

        }

        if(isset($_FILES['company_logo']) && $_FILES['company_logo']['error'] === UPLOAD_ERR_OK){
            $fileTempPath = $_FILES['company_logo']['tmp_name'];
            $fileName = $_FILES['company_logo']['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $uploadDir = "uploads/";
            $newFileName = uniqid('logo_', true) . '.' . $fileExtension;    
            $imagePath = $uploadDir . $newFileName;

            if(in_array($fileExtension, $allowedExtensions)){
                if(move_uploaded_file($fileTempPath, $imagePath)){
                    $newListingData['company_logo'] = $newFileName;
                }else{
                    $errors['company_logo'] = 'Gagal meng-upload file';
                }
            }else{
                $errors['company_logo'] = 'Format file tidak didukung';
            }
        }else{
            $newListingData['company_logo'] = null;
        }

        if(!empty($errors))
        {
            loadView('listings/create', [
                'errors' => $errors,
                'listing' => $newListingData
            ]);
        }else{
            // Submit data
            $fields = implode(', ', array_keys($newListingData));
            $placeholders = implode(', ', array_map(fn($field) => ':' . $field, array_keys($newListingData)));

            $query = "INSERT INTO listings ({$fields}) VALUES ({$placeholders})";

            $this->db->requestQuery($query, $newListingData);

            redirect('/listings');
        }
    }

    /**
     * @param array $params
     * 
     * @return void
     */
    public function destroy($params)
    {
        $id = $params['id'];
        $params = [
            'id' => $id
        ];
        $listing = $this->db->requestQuery('SELECT * FROM listings WHERE id = :id', $params)->fetch();
        if(!$listing)
        {
            ErrorController::notFound('Data Tidak Ditemukan');
            return;
        }
        $this->db->requestQuery('DELETE FROM listings WHERE id = :id', $params);
        redirect('/listings');
    }
}