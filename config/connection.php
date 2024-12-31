<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'moviesvault';

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
echo "Connected successfully!";
