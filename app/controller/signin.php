<?php
require_once '../../config/connection.php';
require_once '../model/Auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Error: Invalid request.");
}

// Sanitize input
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

// Query user
$query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    // Verify password
    if (password_verify($password, $user['password'])) {
        if ($user['status'] !== 'active') {
            die("Your account is inactive. Please contact support.");
        }

        // Set cookies for authentication (valid for 30 days)
        setcookie('user_id', $user['id'], time() + (86400 * 30), '/');
        setcookie('role', $user['role'], time() + (86400 * 30), '/');
        setcookie('name', $user['name'], time() + (86400 * 30), '/');
        setcookie('pic', $user['pic'], time() + (86400 * 30), '/');

        // Redirect based on user role
        if ($user['role'] === 'admin') {
            $redirectUrl = 'http://localhost/moviesvault/src/admin/index.php';
        } elseif ($user['role'] === 'operator') {
            $redirectUrl = 'http://localhost/moviesvault/src/operator/index.php';
        } else {
            $redirectUrl = 'http://localhost/moviesvault/src/user/index.php';
        }

        header("Location: $redirectUrl");
        exit();
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Invalid email or password.";
}

mysqli_close($conn);
