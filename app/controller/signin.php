<?php
require_once '../../config/connection.php';
require_once '../model/Auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Error: Invalid request.");
}

// Sanitize input
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

// Initialize database and user class
$database = new Database();
$db = $database->getConnection();
$user = new User($db);

// Authenticate user
$authUser = $user->signin($email, $password);

if ($authUser) {
    if ($authUser['status'] !== 'active') {
        die("Your account is inactive. Please contact support.");
    }
    // print_r($authUser);

    // Set cookies for authentication (valid for 30 days)
    setcookie('user_id', $authUser['id'], time() + (86400 * 30), '/');
    setcookie('role', $authUser['role'], time() + (86400 * 30), '/');
    setcookie('name', $authUser['name'], time() + (86400 * 30), '/');
    setcookie('pic', $authUser['pic'], time() + (86400 * 30), '/');
    // Redirect based on user role
    if ($authUser['role'] === 'admin') {
        $redirectUrl = 'http://localhost/moviesvault/src/admin/index.php';
    } elseif ($authUser['role'] === 'operator') {
        $redirectUrl = 'http://localhost/moviesvault/src/operator/index.php';
    } else {
        $redirectUrl = 'http://localhost/moviesvault/src/user/index.php';
    }
    header("Location: $redirectUrl");
    exit();
} else {
    echo "Invalid email or password.";
}
