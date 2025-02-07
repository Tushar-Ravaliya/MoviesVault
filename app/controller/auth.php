<?php
require_once '../../config/connection.php';

session_start(); // Start the session

if (!isset($_SESSION['id']) && !isset($_COOKIE['id'])) {
    // Redirect to login page
    header("Location: http://localhost/moviesvault/src/user/login.php");
    exit();
}
