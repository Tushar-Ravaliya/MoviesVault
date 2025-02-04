<?php
// // Database configuration
// $host = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'moviesvault';

// // Create a connection
// $conn = new mysqli($host, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

class Database
{
    private $host = "localhost";
    private $db_name = "moviesvault";
    private $username = "root"; // Change if needed
    private $password = ""; // Change if needed
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
