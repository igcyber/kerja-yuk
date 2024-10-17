<?php

class Database {
    public $conn;
    
    /**
     * @param array $config
     */
    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];
        
        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        }catch(PDOException $e) {
            throw new Exception("Database Connection Error: " . $e->getMessage());
        }
    }

    /**
     * @param string $query
     * 
     * @return string
     */
    public function requestQuery($query)
    {
        try{
            $stm = $this->conn->prepare($query);
            $stm->execute();
            return $stm;
        }catch(PDOException $e){
            throw new Exception("Query Failed : " . $e->getMessage());
        }
    }


}