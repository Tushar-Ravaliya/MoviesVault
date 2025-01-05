<?php
include("../../config/connection.php");
// Sign-In Functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signin'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role, status FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            if ($user['status'] === 'active') { // Check if user is active
                // Set cookies for user authentication
                setcookie('user_id', $user['id'], time() + (86400 * 30), '/'); // Expires in 30 days
                setcookie('role', $user['role'], time() + (86400 * 30), '/'); // Expires in 30 days
                echo 'Sign-in successful!';
                // Redirect based on role
                if ($user['role'] === 'admin') {
                    header('Location: admin_dashboard.php');
                } else {
                    header('Location: http://localhost/moviesvault/src/user/index.php');
                }
                exit;
            } else {
                echo 'Your account is inactive. Please contact support.';
            }
        } else {
            echo 'Invalid password.';
        }
    } else {
        echo 'User not found.';
    }
    $stmt->close();
}
