<?php

class Database {
    private $host = HOST;
    private $db_name = DATABSE_NAME;
    private $username = USERNAME;
    private $password = PASSWORD;
    private $conn;


    /**
         * 
         * Establishes a connection to the database.
         * @return PDO|null 
         * 
    */
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
